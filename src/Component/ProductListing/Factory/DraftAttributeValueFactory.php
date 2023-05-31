<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValue;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;

final class DraftAttributeValueFactory implements DraftAttributeValueFactoryInterface
{
    public function createForAttribute(
        DraftAttributeInterface $attribute,
        DraftInterface $productDraft,
    ): DraftAttributeValueInterface {
        $attributeValue = new DraftAttributeValue();
        $attributeValue->setAttribute($attribute);
        $attributeValue->setSubject($productDraft);

        return $attributeValue;
    }
}
