<?php
/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */
declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Service;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;

interface VendorProfileUpdateServiceInterface
{
    public function createPendingVendorProfileUpdate(Vendor $vendorData): void;

    public function sendEmail(string $recipientAddress, string $token): void;

    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void;
}
