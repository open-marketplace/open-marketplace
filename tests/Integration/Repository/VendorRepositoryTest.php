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
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;

final class VendorRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = $this->entityManager->getRepository(Vendor::class);
    }

    public function test_it_finds_correct_vendor(): void
    {
        $this->loadFixturesFromFile('VendorRepositoryTest/test_it_finds_correct_vendor.yml');
        /** @var VendorInterface $vendorOliver */
        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBySlug('oliver-queen-company');
        $vendorBruce = $this->entityManager->getRepository(Vendor::class)->findOneBySlug('bruce-wayne-company');

        $this->assertEquals('Queen company', $vendorOliver->getCompanyName());
        $this->assertEquals('Wayne enterprise', $vendorBruce->getCompanyName());
    }

    public function test_it_finds_null_for_null_slug_vendor(): void
    {
        $this->loadFixturesFromFile('VendorRepositoryTest/test_it_finds_correct_vendor.yml');
        /** @var VendorInterface $vendorOliver */
        $vendorOliver = $this->entityManager->getRepository(Vendor::class)->findOneBySlug('Not_in_db_slug');

        $this->assertNull($vendorOliver);
    }
}
