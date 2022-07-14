<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface ProductListingPricingClonerInterface
{
    public function clonePrice(ProductDraftInterface $newProductDraft, ProductDraftInterface $productDraft): void;
}
