<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup\Factory;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use DateTimeInterface;

final class VendorFactory implements VendorFactoryInterface
{
    public function createVendor(
        string $companyName,
        string $taxIdentifier,
        string $phoneNumber,
        string $slug,
        string $description,
        string $status,
        ?DateTimeInterface $editedAt = null
    ): VendorInterface {
        $vendor = new Vendor();

        $vendor->setCompanyName($companyName);
        $vendor->setTaxIdentifier($taxIdentifier);
        $vendor->setPhoneNumber($phoneNumber);
        $vendor->setSlug($slug);
        $vendor->setDescription($description);
        $vendor->setStatus($status);
        $vendor->setEditedAt(null);

        return $vendor;
    }
}
