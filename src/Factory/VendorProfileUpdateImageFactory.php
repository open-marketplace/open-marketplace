<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImage;

final class VendorProfileUpdateImageFactory implements VendorProfileUpdateImageFactoryInterface
{
    public function createNew(): VendorImageInterface
    {
        return new VendorProfileUpdateImage();
    }

    public function create(string $path): VendorImageInterface
    {
        $vendorImage = $this->createNew();

        $vendorImage->setPath($path);

        return $vendorImage;
    }

    public function createWithFileAndOwner(VendorImageInterface $uploadedImage, VendorProfileInterface $vendorProfile): VendorImageInterface
    {
        $image = $this->createNew();
        $image->setFile($uploadedImage->getFile());
        $image->setOwner($vendorProfile);

        return $image;
    }
}
