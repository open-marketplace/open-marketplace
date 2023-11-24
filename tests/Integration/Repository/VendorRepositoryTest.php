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

final class VendorRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->repository = self::getContainer()->get('bitbag.open_marketplace.component.vendor.repository.vendor');
    }

    public function test_it_finds_correct_vendor(): void
    {
        $this->loadFixturesFromFile('VendorRepositoryTest/test_it_finds_correct_vendor.yaml');
        $vendorOliver = $this->repository->findOneBySlug('oliver-queen-company');
        $vendorBruce = $this->repository->findOneBySlug('bruce-wayne-company');

        $this->assertEquals('Queen company', $vendorOliver->getCompanyName());
        $this->assertEquals('Wayne enterprise', $vendorBruce->getCompanyName());
    }

    public function test_it_finds_null_for_null_slug_vendor(): void
    {
        $this->loadFixturesFromFile('VendorRepositoryTest/test_it_finds_correct_vendor.yaml');
        $vendorOliver = $this->repository->findOneBySlug('Not_in_db_slug');

        $this->assertNull($vendorOliver);
    }

    public function test_it_finds_vendors_by_settlement_frequency(): void
    {
        $this->loadFixturesFromFile('VendorRepositoryTest/test_it_finds_vendors_by_settlement_frequency.yaml');
        $vendors = $this->repository->findAllBySettlementFrequency('weekly');
        $this->assertCount(2, $vendors);

        $this->assertSame('Oliver-Enterprises-Inc', $vendors[0]->getSlug());
        $this->assertSame('Clark-Enterprises-Inc', $vendors[1]->getSlug());
    }
}
