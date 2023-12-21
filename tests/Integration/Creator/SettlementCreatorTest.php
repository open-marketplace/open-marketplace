<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Creator;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Component\Settlement\Creator\SettlementCreatorInterface;
use Webmozart\Assert\Assert;

final class SettlementCreatorTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->settlementCreator = $this->get('bitbag.open_marketplace.component.settlement.provider.settlement_creator');
    }

    public function test_it_creates_settlement_for_vendor(): void
    {
        $this->loadFixturesFromFile('SettlementCreatorTest/test_it_creates_settlement_for_vendor.yaml');
        $vendorRepository = self::getContainer()->get('open_marketplace.repository.vendor');
        $channelRepository = self::getContainer()->get('sylius.repository.channel');
        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $channels = $channelRepository->findBy(['code' => ['US', 'EU']]);

        $generatedSettlements = $this->settlementCreator->createSettlementsForVendorAndChannel($vendor, $channels, false);
        $this->assertCount(2, $generatedSettlements);

        $settlementUS = $generatedSettlements[0];
        $settlementEU = $generatedSettlements[1];

        $this->assertSame(540, $settlementUS->getTotalAmount());
        $this->assertSame(35, $settlementUS->getTotalCommissionAmount());

        $this->assertSame(1002, $settlementEU->getTotalAmount());
        $this->assertSame(70, $settlementEU->getTotalCommissionAmount());

        try {
            $settlementUS->getId('');
        } catch (\Error $e) {
            Assert::isInstanceOf($e, \Error::class);
            Assert::same($e->getMessage(), "Typed property BitBag\OpenMarketplace\Component\Settlement\Entity\Settlement::\$id must not be accessed before initialization");
        }

        try {
            $settlementEU->getId('');
        } catch (\Error $e) {
            Assert::isInstanceOf($e, \Error::class);
            Assert::same($e->getMessage(), "Typed property BitBag\OpenMarketplace\Component\Settlement\Entity\Settlement::\$id must not be accessed before initialization");
        }
    }
}
