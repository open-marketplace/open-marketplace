<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Entity;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface VirtualWalletInterface extends ResourceInterface
{
    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function getBalance(): int;

    public function getChannel(): ChannelInterface;

    public function setChannel(ChannelInterface $channel): void;

    public function stash(OrderInterface $order): void;

    public function withdraw(SettlementInterface $settlement): void;
}
