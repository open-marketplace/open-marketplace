<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;

interface VendorProfileFactoryInterface
{
    public function createVendor(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        VendorAddressInterface $address
    ): VendorProfileInterface;

    public function createNew(): VendorProfileInterface;
}
