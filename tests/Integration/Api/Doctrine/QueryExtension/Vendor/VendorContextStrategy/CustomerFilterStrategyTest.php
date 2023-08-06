<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy;

use BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\CustomerFilterStrategy;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use Sylius\Component\Core\Model\Customer;
use Sylius\Component\Core\Model\CustomerInterface;
use Tests\BitBag\OpenMarketplace\Integration\IntegrationTestCase;

class CustomerFilterStrategyTest extends IntegrationTestCase
{
    protected function setUp(): void
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->customerRepository = $entityManager->getRepository(Customer::class);
        $this->vendorRepository = $entityManager->getRepository(Vendor::class);
    }

    public function test_supported_class(): void
    {
        $customerFilterStrategy = new CustomerFilterStrategy();
        $result = $customerFilterStrategy->supports(CustomerInterface::class);

        self::assertTrue($result);
    }

    public function test_unsupported_class(): void
    {
        $customerFilterStrategy = new CustomerFilterStrategy();
        $result = $customerFilterStrategy->supports(OrderInterface::class);

        self::assertFalse($result);
    }

    public function test_it_filters_resources(): void
    {
        $this->loadFixturesFromFile('VendorContextStrategy/CustomerFilterStrategyTest/customer_filter_strategy.yml');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $queryBuilder = $this->customerRepository->createQueryBuilder('o');

        $customerFilterStrategy = new customerFilterStrategy();
        $customerFilterStrategy->filterByVendor($queryBuilder, $vendor);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(2, $result);
    }
}
