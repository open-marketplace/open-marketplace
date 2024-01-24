<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Factory;

use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWallet;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;

final class VirtualWalletFactory implements VirtualWalletFactoryInterface
{
    public function createNew(): VirtualWalletInterface
    {
        return new VirtualWallet();
    }

    public function createForVendorAndChannel(
        VendorInterface $vendor,
        ChannelInterface $channel
    ): VirtualWalletInterface {
        $virtualWallet = $this->createNew();
        $virtualWallet->setVendor($vendor);
        $virtualWallet->setChannel($channel);

        return $virtualWallet;
    }
}
