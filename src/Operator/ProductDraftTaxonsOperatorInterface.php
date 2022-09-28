<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Operator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface ProductDraftTaxonsOperatorInterface
{
    public function copyTaxonsToProduct(ProductDraftInterface $productDraft, ProductInterface $product): ?ProductInterface;

    public function updateTaxonsInProduct(ProductDraftInterface $productDraft, ProductInterface $product): ProductInterface;
}
