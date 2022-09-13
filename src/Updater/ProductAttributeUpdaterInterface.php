<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeInterface;

interface ProductAttributeUpdaterInterface
{
    public function update(DraftAttributeInterface $draftAttribute, ProductAttributeInterface $productAttribute): void;
}
