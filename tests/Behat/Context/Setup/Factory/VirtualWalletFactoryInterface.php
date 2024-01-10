<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup\Factory;

use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;

interface VirtualWalletFactoryInterface
{
    public function createVirtualWalletWithBalance(
        ChannelInterface $channel,
        VendorInterface $vendor,
        CustomerInterface $customer,
        int $balance = 0,
        ): VirtualWalletInterface;

    public function createVirtualWallet(
        ChannelInterface $channel,
        VendorInterface $vendor,
        CustomerInterface $customer,
        ): VirtualWalletInterface;
}
