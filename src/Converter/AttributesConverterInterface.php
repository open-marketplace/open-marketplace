<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Converter;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface AttributesConverterInterface
{
    public function convert(ProductDraftInterface $productDraft, ProductInterface $product): void;
}
