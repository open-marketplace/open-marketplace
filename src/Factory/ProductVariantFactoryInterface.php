<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ProductVariant;

interface ProductVariantFactoryInterface
{
    public function createNew(): ProductVariant;
}
