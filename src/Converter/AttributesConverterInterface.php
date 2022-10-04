<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Converter;

use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;

interface AttributesConverterInterface
{
    public function convert(ProductDraftInterface $productDraft, ProductInterface $product): void;
}
