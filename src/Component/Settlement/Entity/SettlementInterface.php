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
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface SettlementInterface extends ResourceInterface, TimestampableInterface
{
    public const STATUS_NEW = 'new';

    public function getId(): ?int;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function getTotalAmount(): int;

    public function setTotalAmount(int $totalAmount): void;

    public function getTotalCommissionAmount(): int;

    public function setTotalCommissionAmount(int $totalCommissionAmount): void;

    public function getTotalProfitAmount(): int;

    public function getStartDate(): \DateTimeInterface;

    public function setStartDate(\DateTimeInterface $startDate): void;

    public function getEndDate(): \DateTimeInterface;

    public function setEndDate(\DateTimeInterface $endDate): void;

    public function getChannel(): ChannelInterface;

    public function setChannel(ChannelInterface $channel): void;
}
