<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use Sylius\Component\Addressing\Model\Country;

interface AddressFactoryInterface
{
    public function createAddress(
        string $street,
        string $city,
        string $postalCode,
        Country $country
    ): VendorAddressInterface;
}
