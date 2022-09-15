<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Operator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;

interface VendorLogoOperatorInterface
{
    public function replaceVendorImage(VendorProfileUpdateInterface $vendorData, VendorInterface $vendor): void;
}
