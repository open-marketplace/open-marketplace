<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Entity;

use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Model\Shipment\ShipmentTrait;
use Sylius\Component\Core\Model\Shipment as BaseShipment;

class Shipment extends BaseShipment implements ShipmentInterface
{
    use ShipmentTrait;
}
