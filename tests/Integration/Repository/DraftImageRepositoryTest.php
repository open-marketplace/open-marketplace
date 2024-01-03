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
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImage;

class DraftImageRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->entityManager->getRepository(DraftImage::class);
    }

    public function test_it_finds_image_for_product_listing(): void
    {
        $this->loadFixturesFromFile('DraftImageRepositoryTest/test_it_finds_image_for_product_listing.yml');

        $draft = $this->entityManager->getRepository(Draft::class)->findOneBy(['versionNumber' => '1']);
        $queryBuilder = $this->repository->findVendorDraftImages($draft);

        self::assertCount(1, $queryBuilder);
    }
}
