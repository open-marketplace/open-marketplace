<?php

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page;

interface VendorPagePageInterface
{
    public function getFirstProductNameFromList(): string;

    public function getLastProductNameFromList(): string;
}
