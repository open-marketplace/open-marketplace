<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateImage;

final class VendorProfileUpdateImageFactory implements VendorProfileUpdateImageFactoryInterface
{
    public function createNew(): VendorImageInterface
    {
        return new VendorProfileUpdateImage();
    }

    public function createWithFileAndOwner(VendorImageInterface $uploadedImage, VendorProfileInterface $vendorProfile): VendorImageInterface
    {
        $image = $this->createNew();
        $image->setFile($uploadedImage->getFile());
        $image->setOwner($vendorProfile);

        return $image;
    }
}
