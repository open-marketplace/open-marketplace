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

class VirtualWallet implements VirtualWalletInterface
{
    protected ?int $id;

    protected int $balance;

    protected VendorInterface $vendor;

    protected ChannelInterface $channel;

    public function __construct()
    {
        $this->balance = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function getChannel(): ChannelInterface
    {
        return $this->channel;
    }

    public function setChannel(ChannelInterface $channel): void
    {
        $this->channel = $channel;
    }

    public function stash(OrderInterface $order): void
    {
        $this->balance += $order->getTotalProfitAmount();
    }

    public function withdraw(SettlementInterface $settlement): void
    {
        if ($this->balance < $settlement->getTotalProfitAmount()) {
            throw new \InvalidArgumentException('Not enough funds to withdraw');
        }

        $this->balance -= $settlement->getTotalProfitAmount();
    }
}
