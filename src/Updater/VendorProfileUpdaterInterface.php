<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Updater;

use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateInterface;

interface VendorProfileUpdaterInterface
{
    public function createPendingVendorProfileUpdate(
        VendorProfileInterface $vendorData,
        VendorInterface $currentVendor,
        ?VendorImageInterface $image
    ): void;

    public function setVendorFromData(VendorProfileInterface $vendor, VendorProfileInterface $data): void;

    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void;
}
