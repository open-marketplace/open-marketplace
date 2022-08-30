<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;

final class VendorProfileUpdateImageFactory implements VendorProfileUpdateImageFactoryInterface
{
    public function createNew(): VendorProfileUpdateImageInterface
    {
        return new VendorProfileUpdateImage();
    }

    public function create(string $path): VendorProfileUpdateImageInterface
    {
        $vendorImage = $this->createNew();

        $vendorImage->setPath($path);


        return $vendorImage;
    }
}
