<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\ShipmentInterface;

interface ShipmentFactoryInterface
{
    public function createNew(): ShipmentInterface;
}
