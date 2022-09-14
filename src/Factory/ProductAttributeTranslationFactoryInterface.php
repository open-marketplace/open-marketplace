<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Product\Model\ProductAttributeTranslationInterface;

interface ProductAttributeTranslationFactoryInterface
{
    public function create(): ProductAttributeTranslationInterface;
}
