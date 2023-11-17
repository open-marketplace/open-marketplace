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
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface SettlementInterface extends ResourceInterface
{
    public function getId(): ?int;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function getOrders(): Collection;

    public function setOrders(Collection $orders): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function getTotalAmount(): int;

    public function setTotalAmount(int $totalAmount): void;

    public function getTotalCommissionAmount(): int;

    public function setTotalCommissionAmount(int $totalCommissionAmount): void;

    public function getTotalProfit(): int;

    public function setTotalProfit(int $totalProfit): void;
}
