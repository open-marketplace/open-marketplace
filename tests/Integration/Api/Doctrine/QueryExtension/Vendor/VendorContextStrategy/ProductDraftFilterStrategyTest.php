<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy;

use BitBag\OpenMarketplace\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\ProductDraftFilterStrategy;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use Tests\BitBag\OpenMarketplace\Integration\IntegrationTestCase;

final class ProductDraftFilterStrategyTest extends IntegrationTestCase
{
    protected function setUp(): void
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->productDraftRepository = $entityManager->getRepository(Draft::class);
        $this->vendorRepository = $entityManager->getRepository(Vendor::class);
    }

    public function test_supported_class(): void
    {
        $productDraftFilterStrategy = new ProductDraftFilterStrategy();
        $result = $productDraftFilterStrategy->supports(DraftInterface::class);

        self::assertTrue($result);
    }

    public function test_unsupported_class(): void
    {
        $productDraftFilterStrategy = new ProductDraftFilterStrategy();
        $result = $productDraftFilterStrategy->supports(ListingInterface::class);

        self::assertFalse($result);
    }

    public function test_it_filters_resources(): void
    {
        $this->loadFixturesFromFile('VendorContextStrategy/ProductDraftFilterStrategyTest/product_draft_filter_strategy.yml');

        $vendor = $this->vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $queryBuilder = $this->productDraftRepository->createQueryBuilder('o');

        $productDraftFilterStrategy = new ProductDraftFilterStrategy();
        $productDraftFilterStrategy->filterByVendor($queryBuilder, $vendor);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(2, $result);
    }
}
