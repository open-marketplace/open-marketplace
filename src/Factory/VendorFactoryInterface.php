<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

interface VendorFactoryInterface
{
    public function createVendor(string $companyName, string $taxIdentifier, string $phoneNumber, VendorAddressInterface $address): VendorProfileInterface;

    public function createNew(): VendorProfileInterface;
}