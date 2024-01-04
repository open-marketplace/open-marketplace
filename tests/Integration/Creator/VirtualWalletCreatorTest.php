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
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;

final class VirtualWalletCreatorTest extends JsonApiTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->virtualWalletCreator = $this->getContainer()->get('open_marketplace.component.settlement.creator.virtual_wallet');
    }

    public function test_it_creates_virtual_wallet(): void
    {
        $this->loadFixturesFromFile('VirtualWalletCreatorTest/test_it_creates_virtual_wallet.yaml');
        $vendor = $this->getEntityManager()->getRepository(VendorInterface::class)->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $channel = $this->getEntityManager()->getRepository(ChannelInterface::class)->findOneBy(['code' => 'US']);

        $result = $this->virtualWalletCreator->createForVendorAndChannel($vendor, $channel);

        $this->expectException(\Error::class);
        $result->getId();
    }

    public function test_it_finds_virtual_wallet(): void
    {
        $this->loadFixturesFromFile('VirtualWalletCreatorTest/test_it_finds_virtual_wallet.yaml');
        $vendor = $this->getEntityManager()->getRepository(VendorInterface::class)->findOneBy(['slug' => 'Wayne-Enterprises-Inc']);
        $channel = $this->getEntityManager()->getRepository(ChannelInterface::class)->findOneBy(['code' => 'US']);

        $result = $this->virtualWalletCreator->createForVendorAndChannel($vendor, $channel);

        self::assertNotNull($result->getId());
    }
}
