<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;

interface VendorFactoryInterface
{
    public function createVendor(string $companyName, string $taxIdentifier, string $phoneNumber, VendorAddressInterface $address): VendorProfileInterface;

    public function createNew(): VendorProfileInterface;
}