<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\DTO;

final class SettlementDTO
{
    private \DateTimeInterface $startDate;

    private \DateTimeInterface $endDate;

    public function __construct(
        private int $totalAmount,
        private int $totalCommissionAmount,
        private string $currencyCode,
        string $startDate,
        string $endDate,
        ) {
        $this->startDate = new \DateTime($startDate);
        $this->endDate = new \DateTime($endDate);
    }

    public function getTotalAmount(): int
    {
        return $this->totalAmount;
    }

    public function getTotalCommissionAmount(): int
    {
        return $this->totalCommissionAmount;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }
}
