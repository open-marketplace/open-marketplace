<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Integration\Repository;

use ApiTestCase\JsonApiTestCase;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use Sylius\Component\Core\Model\Customer;

final class CustomerRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->getContainer()->get('sylius.repository.customer');
        //$this->repository = $this->entityManager->getRepository(Customer::class);
    }

    public function test_it_finds_all_customers_of_vendor(): void
    {
        $this->loadFixturesFromFile('CustomerRepositoryTest/test_it_finds_all_customers_of_vendor.yml');

        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug'=>'oliver-queen-company']);
        $queryBuilder = $this->repository->findVendorCustomers($vendorOliver);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertEquals(1, count($result));
    }

    public function test_it_finds_order_for_vendor(): void
    {
        $this->loadFixturesFromFile('CustomerRepositoryTest/test_it_finds_order_for_vendor.yml');

        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug'=>'oliver-queen-company']);
        $customer = $this->entityManager->getRepository(Customer::class)->findOneBy(['email' => 'test2@example.com']);
        $result = $this->repository->findCustomerForVendor($vendorOliver, (string)$customer->getId());

        self::assertEquals($customer->getId(), $result->getId());
    }
}
