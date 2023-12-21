<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Repository;

use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface VirtualWalletRepositoryInterface extends RepositoryInterface
{
    public function findByVendorAndChannel(VendorInterface $vendor, ChannelInterface $channel): ?VirtualWalletInterface;
}
