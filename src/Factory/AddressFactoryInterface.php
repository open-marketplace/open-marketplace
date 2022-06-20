<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use Sylius\Component\Addressing\Model\Country;

interface AddressFactoryInterface
{
    public function createAddress(string $street, string $city, string $postalCode, Country $country): VendorAddressInterface;

    public function createNew(): VendorAddressInterface;
}