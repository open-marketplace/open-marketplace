<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;

class VendorProfileUpdateFactory
{
    public function createNew(): VendorProfileUpdateInterface
    {
        return new VendorProfileUpdate();
    }

    public function createVendorUpdateInformation(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        VendorAddressInterface $address,
        string $token,
        VendorInterface $vendor
    ): VendorProfileUpdate {
        $vendorUpdate = $this->createNew();
        $vendorUpdate->setPhoneNumber($phoneNumber);
        $vendorUpdate->setCompanyName($companyName);
        $vendorUpdate->setTaxIdentifier($taxIdentifier);
        $vendorUpdate->setVendorAddress($address);

        return $vendorUpdate;
    }
}