<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Admin;

interface VirtualWalletPageInterface
{
    public function getRouteName(): string;

    public function getVirtualWallets(): array;

    public function getSortedVirtualWallets(array $sorting): array;

    public function filterByVendor(string $vendor): void;

    public function filterByChannel(string $channelName): void;

    public function clearFilters(): void;
}
