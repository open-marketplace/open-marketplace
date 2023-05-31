<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValue;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;

final class DraftAttributeValueFactory implements DraftAttributeValueFactoryInterface
{
    public function createForAttribute(
        DraftAttributeInterface $draftAttribute,
        DraftInterface $draft,
    ): DraftAttributeValueInterface {
        $attributeValue = new DraftAttributeValue();
        $attributeValue->setAttribute($draftAttribute);
        $attributeValue->setSubject($draft);

        return $attributeValue;
    }
}
