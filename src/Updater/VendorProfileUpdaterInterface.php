<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface VendorProfileUpdaterInterface
{
    public function createPendingVendorProfileUpdate(VendorProfileInterface $vendorData, VendorInterface $currentVendor, ?ImageInterface $image): void;

    public function setVendorFromData(VendorProfileInterface $vendor, VendorProfileInterface $data): void;

    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void;
}
