<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Product\Model\ProductAttributeTranslationInterface;

interface ProductAttributeTranslationFactoryInterface
{
    public function create(): ProductAttributeTranslationInterface;
}
