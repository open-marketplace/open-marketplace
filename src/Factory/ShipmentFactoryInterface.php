<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

interface ShipmentFactoryInterface
{
    public function createNew(): ShipmentInterface;

    public function createNewWithOrder(OrderInterface $order): ShipmentInterface;

    public function tryCreateNewWithOrderVendorAndDefaultShipment(
        OrderInterface $order,
        ?VendorInterface $vendor
    ): ?ShipmentInterface;
}
