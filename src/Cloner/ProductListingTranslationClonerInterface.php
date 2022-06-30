<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface ProductListingTranslationClonerInterface
{
    public function cloneTranslation(ProductDraftInterface $newProductDraft, ProductDraftInterface $productDraft): void;
}
