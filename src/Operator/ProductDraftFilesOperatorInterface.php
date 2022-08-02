<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Operator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface ProductDraftFilesOperatorInterface
{
    public function copyFilesToProduct(ProductDraftInterface $productDraft, ProductInterface $cratedProduct): void;
}
