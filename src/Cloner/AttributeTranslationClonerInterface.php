<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Cloner;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;

interface AttributeTranslationClonerInterface
{
    public function clone(DraftAttributeInterface $draftAttribute): void;
}
