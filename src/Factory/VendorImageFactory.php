<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImage;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

final class VendorImageFactory implements VendorImageFactoryInterface
{
    public function createNew(): LogoImageInterface
    {
        return new LogoImage();
    }

    public function create(string $path, VendorInterface $vendor): LogoImageInterface
    {
        $vendorImage = new LogoImage();

        $vendorImage->setPath($path);
        $vendorImage->setOwner($vendor);

        return $vendorImage;
    }
}
