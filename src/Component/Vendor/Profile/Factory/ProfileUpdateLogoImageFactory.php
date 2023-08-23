<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Profile\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\LogoImage;

final class ProfileUpdateLogoImageFactory implements ProfileUpdateLogoImageFactoryInterface
{
    public function createNew(): LogoImageInterface
    {
        return new LogoImage();
    }

    public function createWithFileAndOwner(LogoImageInterface $uploadedImage, ProfileInterface $vendorProfile): LogoImageInterface
    {
        $image = $this->createNew();
        $image->setFile($uploadedImage->getFile());
        $image->setOwner($vendorProfile);

        return $image;
    }
}
