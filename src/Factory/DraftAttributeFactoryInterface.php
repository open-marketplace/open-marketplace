<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;

interface DraftAttributeFactoryInterface
{
    public function createTyped(string $type): DraftAttributeInterface;
}
