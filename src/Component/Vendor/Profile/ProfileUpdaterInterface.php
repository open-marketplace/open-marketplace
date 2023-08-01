<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Profile;

use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

interface ProfileUpdaterInterface
{
    public function createPendingVendorProfileUpdate(
        ProfileInterface $vendorData,
        VendorInterface $currentVendor,
        ?LogoImageInterface $image,
        ?BackgroundImageInterface $backgroundImage
    ): void;

    public function setVendorFromData(ProfileInterface $vendor, ProfileInterface $data): void;

    public function updateVendorFromPendingData(ProfileUpdateInterface $vendorData): void;
}
