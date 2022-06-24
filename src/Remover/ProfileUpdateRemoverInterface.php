<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Remover;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;

interface ProfileUpdateRemoverInterface
{
    public function removePendingUpdate(VendorProfileUpdateInterface $vendorData): void;
}
