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

final class SettlementRepositoryTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->repository = self::getContainer()->get('open_marketplace.repository.settlement');
    }

    public function test_it_finds_last_settlement_for_vendor(): void
    {
        $this->loadFixturesFromFile('SettlementRepositoryTest/test_it_finds_last_settlement_for_vendor.yaml');
        $vendorRepository = self::getContainer()->get('open_marketplace.repository.vendor');
        $channelRepository = self::getContainer()->get('sylius.repository.channel');
        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $channel = $channelRepository->findOneBy(['code' => 'US']);

        $settlement = $this->repository->findLastByVendorAndChannel($vendor, $channel);

        $this->assertSame(10000, $settlement->getTotalAmount());
        $this->assertSame(100, $settlement->getTotalCommissionAmount());
    }

    public function test_it_finds_all_available_periods(): void
    {
        $this->loadFixturesFromFile('SettlementRepositoryTest/test_it_finds_all_available_periods.yaml');

        $period[] = $this->generatePeriod('last week monday', 'last week sunday');
        $period[] = $this->generatePeriod('first day of last month', 'last day of last month');
        $period[] = $this->generatePeriod('first day of January', 'last day of January');
        $period[] = $this->generatePeriod('first day of April', 'last day of June');

        rsort($period);

        $period = array_unique($period, \SORT_STRING);

        $this->assertSame(
            $period,
            $this->repository->findAllPeriods()
        );
    }

    public function test_it_finds_all_settlements_by_vendor(): void
    {
        $this->loadFixturesFromFile('SettlementRepositoryTest/test_it_finds_all_settlements_by_vendor.yaml');
        $vendorRepository = self::getContainer()->get('open_marketplace.repository.vendor');
        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $settlements = $this->repository->findAllByVendorQueryBuilder($vendor)->getQuery()->getResult();
        $this->assertCount(3, $settlements);

        foreach ($settlements as $settlement) {
            $this->assertSame($vendor, $settlement->getVendor());
        }
    }

    private function generatePeriod(string $startDate, string $endDate): string
    {
        return sprintf(
            '%s - %s',
            (new \DateTime($startDate))->format('j/m/Y'),
            (new \DateTime($endDate))->format('j/m/Y')
        );
    }
}
