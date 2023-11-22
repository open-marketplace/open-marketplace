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
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;

final class SettlementRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->entityManager = self::getContainer()->get('doctrine.orm.entity_manager');
        $this->repository = self::getContainer()->get('open_marketplace.repository.settlement');
    }

    public function test_it_finds_last_settlement_for_vendor(): void
    {
        $this->loadFixturesFromFile('SettlementRepositoryTest/test_it_find_last_settlement_for_vendor.yml');
        $vendorRepository = $this->getEntityManager()->getRepository(Vendor::class);
        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);

        $settlement = $this->repository->findLastByVendor($vendor);

        $this->assertSame('USD', $settlement->getCurrencyCode());
        $this->assertSame(10000, $settlement->getTotalAmount());
        $this->assertSame(100, $settlement->getTotalCommissionAmount());
    }
}
