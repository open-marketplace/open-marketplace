<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;

interface VendorProfileUpdateFactoryInterface
{
    public function createVendorUpdateInformationWithTokenAndVendor(string $token, VendorInterface $vendor): VendorProfileUpdate;
}