<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface UpdateProductFromDraftHelperInterface
{
    public function updateProduct(ProductDraftInterface $productDraft): void;
}
