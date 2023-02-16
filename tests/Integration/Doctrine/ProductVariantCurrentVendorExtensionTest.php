<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Doctrine;

use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\Doctrine\ProductVariantCurrentVendorExtension;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\ProductVariant;
use Sylius\Component\Core\Model\ProductVariantInterface;

class ProductVariantCurrentVendorExtensionTest extends JsonApiTestCase
{
    public function test_it_does_nothing_for_collection_when_current_resource_is_not_a_product_variant(): void
    {
        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->expects(self::never())
            ->method('getVendor');

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->expects(self::never())
            ->method('getSection');

        $queryBuilder = $this->createMock(QueryBuilder::class);
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            ProductInterface::class,
        );
    }

    public function test_it_does_nothing_for_collection_when_section_in_not_shop_vendor_api(): void
    {
        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->expects(self::never())
            ->method('getVendor');

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->method('getSection')
            ->willReturn($this->createMock(ShopApiSection::class));

        $queryBuilder = $this->createMock(QueryBuilder::class);
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            ProductVariantInterface::class,
        );
    }

    public function test_it_prevents_returning_any_records_for_collection_when_current_user_is_not_vendor_context(): void
    {
        $productVariantRepository = $this->getContainer()->get('doctrine.orm.entity_manager')->getRepository(ProductVariant::class);
        $this->loadFixturesFromFile('ProductVariantCurrentVendorExtensionTest/product_variant_current_Vendor_extension.yml');

        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->method('getVendor')
            ->willReturn(null);

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->method('getSection')
            ->willReturn($this->createMock(ShopVendorApiSection::class));

        $queryBuilder = $productVariantRepository->createQueryBuilder('o');
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            ProductVariantInterface::class,
        );

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(0, $result);
    }

    public function test_it_filters_resources_when_getting_collection_by_current_vendor(): void
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $productVariantRepository = $entityManager->getRepository(ProductVariant::class);
        $vendorRepository = $entityManager->getRepository(Vendor::class);

        $this->loadFixturesFromFile('ProductVariantCurrentVendorExtensionTest/product_variant_current_Vendor_extension.yml');

        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->method('getVendor')
            ->willReturn($vendor);

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->method('getSection')
            ->willReturn($this->createMock(ShopVendorApiSection::class));

        $queryBuilder = $productVariantRepository->createQueryBuilder('o');
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            ProductVariantInterface::class,
        );

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(3, $result);
    }

    public function test_it_does_nothing_for_item_when_current_resource_is_not_a_product_variant(): void
    {
        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->expects(self::never())
            ->method('getVendor');

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->expects(self::never())
            ->method('getSection');

        $queryBuilder = $this->createMock(QueryBuilder::class);
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            ProductInterface::class,
            ['id']
        );
    }

    public function test_it_does_nothing_for_item_when_section_in_not_shop_vendor_api(): void
    {
        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->expects(self::never())
            ->method('getVendor');

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->method('getSection')
            ->willReturn($this->createMock(ShopApiSection::class));

        $queryBuilder = $this->createMock(QueryBuilder::class);
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            ProductVariantInterface::class,
            ['id']
        );
    }

    public function test_it_prevents_returning_any_records_for_item_when_current_user_is_not_vendor_context(): void
    {
        $productVariantRepository = $this->getContainer()->get('doctrine.orm.entity_manager')->getRepository(ProductVariant::class);
        $this->loadFixturesFromFile('ProductVariantCurrentVendorExtensionTest/product_variant_current_Vendor_extension.yml');

        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->method('getVendor')
            ->willReturn(null);

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->method('getSection')
            ->willReturn($this->createMock(ShopVendorApiSection::class));

        $queryBuilder = $productVariantRepository->createQueryBuilder('o');
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            ProductVariantInterface::class,
            ['id']
        );

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(0, $result);
    }

    public function test_it_filters_resources_when_getting_item_by_current_vendor(): void
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $productVariantRepository = $entityManager->getRepository(ProductVariant::class);
        $vendorRepository = $entityManager->getRepository(Vendor::class);

        $this->loadFixturesFromFile('ProductVariantCurrentVendorExtensionTest/product_variant_current_Vendor_extension.yml');

        $vendor = $vendorRepository->findOneBy(['slug' => 'Weyland-Corp']);

        $vendorContext = $this->createMock(VendorContextInterface::class);
        $vendorContext
            ->method('getVendor')
            ->willReturn($vendor);

        $sectionProvider = $this->createMock(SectionProviderInterface::class);
        $sectionProvider
            ->method('getSection')
            ->willReturn($this->createMock(ShopVendorApiSection::class));

        $queryBuilder = $productVariantRepository->createQueryBuilder('o');
        $queryNameGenerator = $this->createMock(QueryNameGeneratorInterface::class);

        $productVariantCurrentVendorExtension = new ProductVariantCurrentVendorExtension($vendorContext, $sectionProvider);
        $productVariantCurrentVendorExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            ProductVariantInterface::class,
            ['id']
        );

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(2, $result);
    }
}
