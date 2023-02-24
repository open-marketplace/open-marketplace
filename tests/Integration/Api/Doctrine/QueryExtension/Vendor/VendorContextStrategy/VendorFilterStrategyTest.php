<?php

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
        $result = $vendorFilterStrategy->isSupportClass(OptionalVendorAwareInterface::class);

        self::assertTrue($result);
    }

    public function test_supported_class_vendor_aware(): void
    {
        $vendorFilterStrategy = new VendorFilterStrategy();
        $result = $vendorFilterStrategy->isSupportClass(VendorAwareInterface::class);

        self::assertTrue($result);
    }

    public function test_unsupported_class(): void
    {
        $vendorFilterStrategy = new VendorFilterStrategy();
        $result = $vendorFilterStrategy->isSupportClass(ProductVariantInterface::class);

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
