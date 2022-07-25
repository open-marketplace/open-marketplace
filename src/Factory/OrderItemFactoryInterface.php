<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;

interface OrderItemFactoryInterface
{
    public function createNew(): OrderItemInterface;
}
