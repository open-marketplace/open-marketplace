<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy;

use BitBag\OpenMarketplace\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\VendorFilterStrategy;
use BitBag\OpenMarketplace\Entity\OptionalVendorAwareInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttribute;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorAwareInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Tests\BitBag\OpenMarketplace\Integration\IntegrationTestCase;

class VendorFilterStrategyTest extends IntegrationTestCase
{
    protected function setUp(): void
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->draftAttributeRepository = $entityManager->getRepository(DraftAttribute::class);
        $this->vendorRepository = $entityManager->getRepository(Vendor::class);
    }

    public function test_supported_class_optional_vendor_aware(): void
    {
        $vendorFilterStrategy = new VendorFilterStrategy();
        $result = $vendorFilterStrategy->supports(OptionalVendorAwareInterface::class);

        self::assertTrue($result);
    }

    public function test_supported_class_vendor_aware(): void
    {
        $vendorFilterStrategy = new VendorFilterStrategy();
        $result = $vendorFilterStrategy->supports(VendorAwareInterface::class);

        self::assertTrue($result);
    }

    public function test_unsupported_class(): void
    {
        $vendorFilterStrategy = new VendorFilterStrategy();
        $result = $vendorFilterStrategy->supports(ProductVariantInterface::class);

        self::assertFalse($result);
    }

    public function test_it_filters_resources(): void
    {
        $this->loadFixturesFromFile('VendorContextStrategy/VendorFilterStrategyTest/vendor_filter_strategy.yml');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $queryBuilder = $this->draftAttributeRepository->createQueryBuilder('o');

        $vendorFilterStrategy = new VendorFilterStrategy();
        $vendorFilterStrategy->filterByVendor($queryBuilder, $vendor);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(2, $result);
    }
}
