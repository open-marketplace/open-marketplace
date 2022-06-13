<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface CreateProductFromDraftHelperInterface
{
    public function createSimpleProduct(ProductDraftInterface $productDraft): void;
}
