<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Calculator;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;

final class ShipmentUnitsRecalculator implements ShipmentUnitsRecalculatorInterface
{
    public function recalculateShipmentUnits(OrderInterface $order): void
    {
        foreach ($order->getShipments() as $shipment) {
            foreach ($shipment->getUnits() as $unit) {
                $shipment->removeUnit($unit);
            }
        }

        foreach ($order->getItemUnits() as $itemUnit) {
            /** @var OrderItemInterface $orderItem */
            $orderItem = $itemUnit->getOrderItem();
            /** @var ProductInterface $product */
            $product = $orderItem->getVariant()?->getProduct();
            if (null === $itemUnit->getShipment()) {
                $shipment = null;
                if ($product->hasVendor()) {
                    $shipment = $order->getShipmentByVendor($product->getVendor());
                } else {
                    $shipment = $order->getShipmentWithoutVendor();
                }

                $shipment?->addUnit($itemUnit);
            }
        }
    }
}
