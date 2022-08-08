<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingAttribute\ProductListingAttribute;

interface DraftAttributeFactoryInterface
{
    public function createTyped(string $type): DraftAttributeInterface;

    public function createNew();
}
