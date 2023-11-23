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
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use Sylius\Component\Core\Model\Customer;

final class OrderRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->getContainer()->get('sylius.repository.order');
    }

    public function test_it_finds_all_customers_of_vendor(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_all_vendor_orders.yml');

        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'oliver-queen-company']);
        $queryBuilder = $this->repository->findAllByVendorQueryBuilder($vendorOliver);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(1, $result);
    }

    public function test_it_finds_order_for_vendor(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_order_for_vendor.yml');

        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'oliver-queen-company']);
        $order = $this->repository->findOneBy(['vendor' => $vendorOliver]);
        $result = $this->repository->findOrderForVendor($vendorOliver, (string) $order->getId());

        self::assertEquals($order->getId(), $result->getId());
    }

    public function test_it_finds_orders_for_vendors_customer(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_orders_for_vendors_customer.yml');

        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'oliver-queen-company']);
        $customer = $this->entityManager->getRepository(Customer::class)->findOneBy(['email' => 'test2@example.com']);
        $queryBuilder = $this->repository->findOrdersForVendorByCustomer($vendorOliver, (string) $customer->getId());

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(1, $result);
    }

    public function test_it_gets_settlement_dtos_for_vendor(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_order_for_vendor_for_settlement.yml');
        $vendorWayne = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $vendorWeyland = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'Weyland-Corp']);

        $vendorWayneSettlementDTOs = $this->repository->getSettlementDTOForVendorFromDate($vendorWayne, null);

        $this->assertCount(2, $vendorWayneSettlementDTOs);
        $this->assertSame('USD', $vendorWayneSettlementDTOs[0]->getCurrencyCode());
        $this->assertSame(540, $vendorWayneSettlementDTOs[0]->getTotalAmount());
        $this->assertSame(35, $vendorWayneSettlementDTOs[0]->getTotalCommissionAmount());
        $this->assertSame('EUR', $vendorWayneSettlementDTOs[1]->getCurrencyCode());
        $this->assertSame(1002, $vendorWayneSettlementDTOs[1]->getTotalAmount());
        $this->assertSame(70, $vendorWayneSettlementDTOs[1]->getTotalCommissionAmount());

        $vendorWeylandSettlementDTOs = $this->repository->getSettlementDTOForVendorFromDate($vendorWeyland, null);
        $this->assertCount(1, $vendorWeylandSettlementDTOs);
        $this->assertSame(700, $vendorWeylandSettlementDTOs[0]->getTotalAmount());
        $this->assertSame(100, $vendorWeylandSettlementDTOs[0]->getTotalCommissionAmount());
        $this->assertSame('USD', $vendorWeylandSettlementDTOs[0]->getCurrencyCode());
    }

    public function test_it_gets_settlement_dtos_for_vendor_from_date(): void
    {
        $this->loadFixturesFromFile('OrderRepositoryTest/test_it_finds_order_for_vendor_for_settlement_with_dates.yml');
        $vendorWayne = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $vendorWeyland = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'Weyland-Corp']);

        $vendorWayneSettlementDTOs = $this->repository->getSettlementDTOForVendorFromDate($vendorWayne, date_create('-5 days'));
        $this->assertCount(1, $vendorWayneSettlementDTOs);
        $this->assertSame(1002, $vendorWayneSettlementDTOs[0]->getTotalAmount());
        $this->assertSame(70, $vendorWayneSettlementDTOs[0]->getTotalCommissionAmount());
        $this->assertSame('EUR', $vendorWayneSettlementDTOs[0]->getCurrencyCode());

        $vendorWeylandSettlementDTOs = $this->repository->getSettlementDTOForVendorFromDate($vendorWeyland, date_create('-5 days'));
        $this->assertEmpty($vendorWeylandSettlementDTOs);
    }
}
