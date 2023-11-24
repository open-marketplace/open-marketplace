<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Repository;

use ApiTestCase\JsonApiTestCase;

final class OrderRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->orderRepository = self::getContainer()->get('sylius.repository.order');
        $this->vendorRepository = self::getContainer()->get('bitbag.open_marketplace.component.vendor.repository.vendor');
    }

    public function test_it_finds_all_customers_of_vendor(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_all_vendor_orders.yaml');

        $vendorOliver = $this->vendorRepository->findOneBy(['slug' => 'oliver-queen-company']);
        $queryBuilder = $this->orderRepository->findAllByVendorQueryBuilder($vendorOliver);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(1, $result);
    }

    public function test_it_finds_order_for_vendor(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_order_for_vendor.yaml');

        $vendorOliver = $this->vendorRepository->findOneBy(['slug' => 'oliver-queen-company']);
        $order = $this->orderRepository->findOneBy(['vendor' => $vendorOliver]);
        $result = $this->orderRepository->findOrderForVendor($vendorOliver, (string) $order->getId());

        self::assertEquals($order->getId(), $result->getId());
    }

    public function test_it_finds_orders_for_vendors_customer(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_orders_for_vendors_customer.yaml');

        $vendorOliver = $this->vendorRepository->findOneBy(['slug' => 'oliver-queen-company']);
        $customer = self::getContainer()->get('sylius.repository.customer')->findOneBy(['email' => 'test2@example.com']);
        $queryBuilder = $this->orderRepository->findOrdersForVendorByCustomer($vendorOliver, (string) $customer->getId());

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(1, $result);
    }

    public function test_it_finds_for_settlement(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_for_settlement.yaml');
        $vendorWayne = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $vendorWeyland = $this->vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);
        $channel = self::getContainer()->get('sylius.repository.channel')->findOneBy(['code' => 'US']);

        $startDate = new \DateTime('last week monday 00:00:00');
        $endDate = new \DateTime('last week sunday 23:59:59');

        $lastSettlementVendorWeyland = $this->orderRepository->findForSettlementByVendorAndChannelAndDates($vendorWeyland, $channel, $startDate, $endDate);
        $lastSettlementVendorWayne = $this->orderRepository->findForSettlementByVendorAndChannelAndDates($vendorWayne, $channel, $startDate, $endDate);

        $this->assertSame($lastSettlementVendorWeyland['total'], '700');
        $this->assertSame($lastSettlementVendorWeyland['commissionTotal'], '100');
        $this->assertNull($lastSettlementVendorWayne['total']);
        $this->assertNull($lastSettlementVendorWayne['commissionTotal']);
    }
}
