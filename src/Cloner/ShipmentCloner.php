<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Sylius\Component\Core\Model\Adjustment;
use Sylius\Component\Core\Model\ShipmentInterface;

final class ShipmentCloner implements ShipmentClonerInterface
{
    private AdjustmentClonerInterface $adjustmentCloner;

    public function __construct(AdjustmentClonerInterface $adjustmentCloner)
    {
        $this->adjustmentCloner = $adjustmentCloner;
    }

    public function clone(ShipmentInterface $originalShipment, ShipmentInterface $newShipment): void
    {
        $newShipment->setState($originalShipment->getState());
        $newShipment->setUpdatedAt($originalShipment->getUpdatedAt());
        $newShipment->setCreatedAt($originalShipment->getCreatedAt());
        $newShipment->setMethod($originalShipment->getMethod());
        $adjustments = $originalShipment->getAdjustments();
        foreach ($adjustments as $adjustment) {
            $newAdjustment = new Adjustment();
            $this->adjustmentCloner->clone($adjustment, $newAdjustment);
            $newShipment->addAdjustment($newAdjustment);
        }
    }
}
