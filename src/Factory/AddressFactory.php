<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddress;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use Sylius\Component\Addressing\Model\Country;

class AddressFactory
{
    public function createAddress(
        string $street,
        string $city,
        string $postalCode,
        Country $country
    ): VendorAddressInterface
    {
        $address = $this->createNew();
        $address->setCountry($country);
        $address->setPostalCode($postalCode);
        $address->setStreet($street);
        $address->setCity($city);

        return $address;
    }

    public function createNew(): VendorAddressInterface
    {
        return new VendorAddress();
    }
}
