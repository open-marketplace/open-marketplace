<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;

interface VendorImageFactoryInterface
{
    public function createNew(): VendorImageInterface;

    public function create(
        string $path,
        VendorInterface $vendor
    ): VendorImageInterface;
}
