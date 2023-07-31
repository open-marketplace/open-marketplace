<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;

interface VendorProfileUpdateImageFactoryInterface
{
    public function createNew(): LogoImageInterface;

    public function createWithFileAndOwner(LogoImageInterface $uploadedImage, ProfileInterface $vendorProfile): LogoImageInterface;
}
