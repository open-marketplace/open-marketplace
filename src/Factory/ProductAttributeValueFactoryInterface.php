<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Product\Model\ProductAttributeValueInterface;

interface ProductAttributeValueFactoryInterface
{
    public function create(): ProductAttributeValueInterface;
}
