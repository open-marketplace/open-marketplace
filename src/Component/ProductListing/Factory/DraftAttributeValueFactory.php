<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeValue;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;

final class DraftAttributeValueFactory implements DraftAttributeValueFactoryInterface
{
    public function createForAttribute(
        DraftAttributeInterface $attribute,
        ProductDraftInterface $productDraft,
    ): DraftAttributeValueInterface {
        $attributeValue = new DraftAttributeValue();
        $attributeValue->setAttribute($attribute);
        $attributeValue->setSubject($productDraft);

        return $attributeValue;
    }
}
