<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Entity;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

class Settlement implements SettlementInterface
{
    use TimestampableTrait;

    protected ?int $id;

    protected VendorInterface $vendor;

    protected string $status = self::STATUS_NEW;

    protected int $totalAmount;

    protected int $totalCommissionAmount;

    protected ChannelInterface $channel;

    protected \DateTimeInterface $startDate;

    protected \DateTimeInterface $endDate;

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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getTotalAmount(): int
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(int $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    public function getTotalCommissionAmount(): int
    {
        return $this->totalCommissionAmount;
    }

    public function setTotalCommissionAmount(int $totalCommissionAmount): void
    {
        $this->totalCommissionAmount = $totalCommissionAmount;
    }

    public function getTotalProfitAmount(): int
    {
        return $this->totalAmount - $this->totalCommissionAmount;
    }

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getChannel(): ChannelInterface
    {
        return $this->channel;
    }

    public function setChannel(ChannelInterface $channel): void
    {
        $this->channel = $channel;
    }
}
