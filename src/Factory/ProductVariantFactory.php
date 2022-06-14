<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ProductVariant;

final class ProductVariantFactory implements ProductVariantFactoryInterface
{
    public function createNew(): ProductVariant
    {
        return new ProductVariant();
    }
}
