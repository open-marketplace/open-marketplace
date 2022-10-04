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
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListing;
use BitBag\OpenMarketplace\Entity\Vendor;

final class ProductListingRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->entityManager->getRepository(ProductListing::class);
    }

    public function test_it_finds_product_listings_with_latest_draft(): void
    {
        $this->loadFixturesFromFile('ProductListingRepositoryTest/test_it_finds_product_listings_with_latest_draft.yml');

        $queryBuilder = $this->repository->createQueryBuilderWithLatestDraft();

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(3, $result);
    }

    public function test_it_finds_product_listings_with_latest_draft_by_vendor(): void
    {
        $this->loadFixturesFromFile('ProductListingRepositoryTest/test_it_finds_product_listings_with_latest_draft_by_vendor.yml');

        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBy(['slug' => 'oliver-queen-company']);
        $queryBuilder = $this->repository->createQueryBuilderByVendor($vendorOliver);

        $result = $queryBuilder->getQuery()->getResult();
        self::assertCount(2, $result);
    }
}
