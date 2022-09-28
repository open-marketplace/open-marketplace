<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;

final class OrderVendorHelper implements OrderVendorHelperInterface
{
    public function orderHasVendorItems(OrderInterface $order): bool
    {
        foreach ($order->getItems() as $item) {
            /** @var ProductInterface $product */
            $product = $item->getVariant()?->getProduct();
            if ($product->hasVendor()) {
                return true;
            }
        }

        return false;
    }

    public function orderHasVendorShipment(OrderInterface $order, VendorInterface $vendor): bool
    {
        /** @var ShipmentInterface $shipment */
        foreach ($order->getShipments() as $shipment) {
            if ($shipment->hasVendor() && $shipment->getVendor() === $vendor) {
                return true;
            }
        }

        return false;
    }

    public function orderHasShipmentWithoutVendor(OrderInterface $order): bool
    {
        /** @var ShipmentInterface $shipment */
        foreach ($order->getShipments() as $shipment) {
            if (false === $shipment->hasVendor()) {
                return true;
            }
        }

        return false;
    }

    public function getVendorsFromOrder(OrderInterface $order): array
    {
        $vendors = [];

        foreach ($order->getItems() as $item) {
            /** @var ProductInterface $product */
            $product = $item->getVariant()?->getProduct();
            $vendor = $product->getVendor();

            if (null !== $vendor && false === in_array($vendor, $vendors)) {
                $vendors[] = $vendor;
            }
        }

        return $vendors;
    }

    public function getShipmentByVendor(OrderInterface $order, ?VendorInterface $vendor): ?ShipmentInterface
    {
        /** @var ShipmentInterface $shipment */
        foreach ($order->getShipments() as $shipment) {
            if ($shipment->hasVendor() && $shipment->getVendor() === $vendor) {
                return $shipment;
            }
        }

        return null;
    }

    public function getShipmentWithoutVendor(OrderInterface $order): ?ShipmentInterface
    {
        /** @var ShipmentInterface $shipment */
        foreach ($order->getShipments() as $shipment) {
            if (false === $shipment->hasVendor()) {
                return $shipment;
            }
        }

        return null;
    }
}
