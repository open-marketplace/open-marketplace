<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;

interface OrderItemFactoryInterface
{
    public function createNew(): OrderItemInterface;
}
