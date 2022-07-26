<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;

interface OrderFactoryInterface
{
    public function createNew(): OrderInterface;
}
