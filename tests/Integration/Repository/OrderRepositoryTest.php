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
        $queryBuilder = $this->repository->findAllByVendor($vendorOliver);

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
}
