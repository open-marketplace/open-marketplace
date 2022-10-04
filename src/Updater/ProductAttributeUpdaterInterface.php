<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Updater;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeInterface;

interface ProductAttributeUpdaterInterface
{
    public function update(DraftAttributeInterface $draftAttribute, ProductAttributeInterface $productAttribute): void;
}
