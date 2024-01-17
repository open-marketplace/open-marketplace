<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Admin;

interface SettlementPageInterface
{
    public function openSettlementsIndex(array $sorting = []): void;

    public function getSettlements(): array;

    public function getSettlementsWithStatus(string $status = null): array;

    public function getSortedSettlements(array $sorting): array;

    public function filterByStatus(string $status): void;

    public function filterByPeriod(string $period): void;

    public function filterByVendor(string $vendor): void;

    public function filterByChannel(string $channelName): void;

    public function clearFilters(): void;

    public function getSettlementsForVendor(string $vendorName);

    public function checkExistsSettlementForAmountAndChannel(string $amount, string $channelName): void;

    public function getSettlementsByPeriodEndsToday(bool $endsToday): array;
}
