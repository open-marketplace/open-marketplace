<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Factory;

use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface VirtualWalletFactoryInterface extends FactoryInterface
{
    public function createNew(): VirtualWalletInterface;

    public function createForVendorAndChannel(
        VendorInterface $vendor,
        ChannelInterface $channel
    ): VirtualWalletInterface;
}
