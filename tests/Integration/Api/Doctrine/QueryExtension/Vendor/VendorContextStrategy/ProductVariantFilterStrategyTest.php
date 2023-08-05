<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy;

use BitBag\OpenMarketplace\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\ProductVariantFilterStrategy;
use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use Sylius\Component\Core\Model\ProductVariant;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Tests\BitBag\OpenMarketplace\Integration\IntegrationTestCase;

class ProductVariantFilterStrategyTest extends IntegrationTestCase
{
    protected function setUp(): void
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->productVariantRepository = $entityManager->getRepository(ProductVariant::class);
        $this->vendorRepository = $entityManager->getRepository(Vendor::class);
    }

    public function test_supported_class(): void
    {
        $productVariantFilterStrategy = new ProductVariantFilterStrategy();
        $result = $productVariantFilterStrategy->supports(ProductVariantInterface::class);

        self::assertTrue($result);
    }

    public function test_unsupported_class(): void
    {
        $productVariantFilterStrategy = new ProductVariantFilterStrategy();
        $result = $productVariantFilterStrategy->supports(ProductInterface::class);

        self::assertFalse($result);
    }

    public function test_it_filters_resources(): void
    {
        $this->loadFixturesFromFile('VendorContextStrategy/ProductVariantFilterStrategyTest/product_variant_filter_strategy.yml');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $queryBuilder = $this->productVariantRepository->createQueryBuilder('o');

        $productVariantFilterStrategy = new ProductVariantFilterStrategy();
        $productVariantFilterStrategy->filterByVendor($queryBuilder, $vendor);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(3, $result);
    }
}
