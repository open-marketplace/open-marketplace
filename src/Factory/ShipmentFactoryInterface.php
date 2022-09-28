<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;

interface ShipmentFactoryInterface
{
    public function createNew(): ShipmentInterface;
}
