<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorAddressInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileInterface;

final class VendorProfileFactory implements VendorProfileFactoryInterface
{
    public function createVendor(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $description,
        VendorAddressInterface $address
    ): VendorProfileInterface {
        $vendor = $this->createNew();
        $vendor->setPhoneNumber($phoneNumber);
        $vendor->setCompanyName($companyName);
        $vendor->setTaxIdentifier($taxIdentifier);
        $vendor->setDescription($description);
        $vendor->setVendorAddress($address);

        return $vendor;
    }

    public function createNew(): VendorProfileInterface
    {
        return new Vendor();
    }
}
