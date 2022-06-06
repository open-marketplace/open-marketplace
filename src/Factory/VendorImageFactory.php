<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;

final class VendorImageFactory implements VendorImageFactoryInterface
{
    public function createNew(): VendorImageInterface
    {
        return new VendorImage();
    }

    public function create(string $path, VendorInterface $vendor): VendorImageInterface
    {
        $vendorImage = new VendorImage();

        $vendorImage->setPath($path);
        $vendorImage->setVendor($vendor);

        return $vendorImage;
    }
}
