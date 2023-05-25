<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;

interface DraftAttributeValueFactoryInterface
{
    public function createForAttribute(
        DraftAttributeInterface $attribute,
        ProductDraftInterface $productDraft,
    ): DraftAttributeValueInterface;
}
