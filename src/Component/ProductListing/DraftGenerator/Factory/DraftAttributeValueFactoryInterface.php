<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;

interface DraftAttributeValueFactoryInterface
{
    public function createForAttribute(
        DraftAttributeInterface $draftAttribute,
        DraftInterface $draft,
    ): DraftAttributeValueInterface;
}
