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
use Doctrine\Common\Collections\Collection;

class Settlement implements SettlementInterface
{
    protected ?int $id;

    protected VendorInterface $vendor;

    /** @var Collection<int, OrderInterface> */
    protected Collection $orders;

    protected string $status;

    protected int $totalAmount;
    protected int $totalCommissionAmount;

    protected int $totalProfit;
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

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
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

    public function getTotalProfit(): int
    {
        return $this->totalProfit;
    }

    public function setTotalProfit(int $totalProfit): void
    {
        $this->totalProfit = $totalProfit;
    }

}
