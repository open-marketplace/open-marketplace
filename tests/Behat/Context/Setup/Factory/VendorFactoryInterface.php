<?php

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Setup\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use DateTimeInterface;

interface VendorFactoryInterface
{
    public function createVendor(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $slug,
        string $description,
        string $status,
        ?DateTimeInterface $editedAt = null
    ): VendorInterface;
}
