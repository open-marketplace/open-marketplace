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

final class SettlementCreatorTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->settlementCreator = $this->get('bitbag.open_marketplace.component.settlement.creator.settlement');
    }

    public function test_it_creates_settlement_for_vendor_and_channels(): void
    {
        $this->loadFixturesFromFile('SettlementCreatorTest/test_it_creates_settlement_for_vendor_and_channels.yaml');
        $vendorRepository = self::getContainer()->get('open_marketplace.repository.vendor');
        $channelRepository = self::getContainer()->get('sylius.repository.channel');
        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $channels = $channelRepository->findBy(['code' => ['US', 'EU']]);

        $generatedSettlements = $this->settlementCreator->createSettlementsForVendorAndChannels($vendor, $channels);
        $this->assertCount(2, $generatedSettlements);

        $settlementUS = $generatedSettlements[0];
        $settlementEU = $generatedSettlements[1];

        $this->assertSame(540, $settlementUS->getTotalAmount());
        $this->assertSame(35, $settlementUS->getTotalCommissionAmount());

        $this->assertSame(1002, $settlementEU->getTotalAmount());
        $this->assertSame(70, $settlementEU->getTotalCommissionAmount());

        $this->expectException(\Error::class);
        $settlementUS->getId();
    }

    public function test_it_creates_settlement_for_vendor_and_channel_and_amount(): void
    {
        $this->loadFixturesFromFile('SettlementCreatorTest/test_it_creates_settlement_for_vendor_and_channel_and_amount.yaml');
        $vendorRepository = self::getContainer()->get('open_marketplace.repository.vendor');
        $channelRepository = self::getContainer()->get('sylius.repository.channel');

        $vendor = $vendorRepository->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $channel = $channelRepository->findOneBy(['code' => ['US', 'EU']]);

        $amount = 1000;

        $settlement = $this->settlementCreator->createSettlementForVendorAndChannelAndAmount($vendor, $channel, $amount);

        $this->assertSame(1000, $settlement->getTotalAmount());
        $this->assertSame(0, $settlement->getTotalCommissionAmount());

        $this->expectException(\Error::class);
        $settlement->getId();
    }
}
