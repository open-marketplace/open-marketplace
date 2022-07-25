<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;

interface OrderFactoryInterface
{
    public function createNew(): OrderInterface;
}
