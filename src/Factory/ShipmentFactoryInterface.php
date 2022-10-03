<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;

interface ShipmentFactoryInterface
{
    public function createNew(): ShipmentInterface;

    public function createNewWithOrder(OrderInterface $order): ShipmentInterface;

    public function tryCreateNewWithOrderVendorAndDefaultShipment(
        OrderInterface $order,
        ?VendorInterface $vendor
    ): ?ShipmentInterface;
}
