<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Order;

interface OrderFactoryInterface
{
    public function createNew(): Order;
}
