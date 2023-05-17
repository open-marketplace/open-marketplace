<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\VendorBackgroundImage;
use BitBag\OpenMarketplace\Entity\VendorBackgroundImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

final class VendorBackgroundImageFactory implements VendorBackgroundImageFactoryInterface
{
    public function createNew(): VendorBackgroundImageInterface
    {
        return new VendorBackgroundImage();
    }

    public function create(string $path, VendorInterface $vendor): VendorBackgroundImageInterface
    {
        $vendorBackgroundImage = new VendorBackgroundImage();

        $vendorBackgroundImage->setPath($path);
        $vendorBackgroundImage->setOwner($vendor);

        return $vendorBackgroundImage;
    }
}
