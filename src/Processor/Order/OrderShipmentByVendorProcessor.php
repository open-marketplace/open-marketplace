<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Calculator\ShipmentUnitsRecalculatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ShipmentFactoryInterface;
use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;
use Webmozart\Assert\Assert;

final class OrderShipmentByVendorProcessor implements OrderProcessorInterface, OrderShipmentByVendorProcessorInterface
{
    private ShipmentFactoryInterface $shipmentFactory;

    private ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator;

    public function __construct(
        ShipmentFactoryInterface $shipmentFactory,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ) {
        $this->shipmentFactory = $shipmentFactory;
        $this->shipmentUnitsRecalculator = $shipmentUnitsRecalculator;
    }

    /**
     * @param OrderInterface $order
     */
    public function process(BaseOrderInterface $order): void
    {
        Assert::isInstanceOf($order, OrderInterface::class);

        if (BaseOrderInterface::STATE_CART !== $order->getState()) {
            return;
        }

        if ($order->isEmpty() || !$order->isShippingRequired()) {
            $order->removeShipments();

            return;
        }

        if (false === $order->hasVendorItems()) {
            return;
        }

        $this->removeShipmentsWithMissingVendors($order);

        $this->addShipmentsPerVendor($order);

        $this->shipmentUnitsRecalculator->recalculateShipmentUnits($order);

        $this->removeShipmentWithoutVendorIfEmpty($order);
    }

    private function removeShipmentsWithMissingVendors(OrderInterface $order): void
    {
        $vendors = $order->getVendorsFromOrderItems();
        /** @var ShipmentInterface $shipment */
        foreach ($order->getShipments() as $shipment) {
            if (false === in_array($shipment->getVendor(), $vendors)) {
                $order->removeShipment($shipment);
            }
        }
    }

    private function addShipmentsPerVendor(OrderInterface $order): void
    {
        $vendors = $order->getVendorsFromOrderItems();

        if (false === $order->hasShipmentWithoutVendor()) {
            $this->addShipment($order, null);
        }

        foreach ($vendors as $vendor) {
            if ($order->hasVendorShipment($vendor)) {
                continue;
            }

            $this->addShipment($order, $vendor);
        }
    }

    private function addShipment(OrderInterface $order, ?VendorInterface $vendor): void
    {
        /** @var ShipmentInterface $shipment */
        $shipment = $this
                ->shipmentFactory
                ->tryCreateNewWithOrderVendorAndDefaultShipment($order, $vendor)
            ;

        if (null !== $shipment) {
            $order->addShipment($shipment);
        }
    }

    private function removeShipmentWithoutVendorIfEmpty(OrderInterface $order): void
    {
        $shipment = $order->getShipmentWithoutVendor();

        if (null !== $shipment) {
            if ($shipment->getUnits()->isEmpty()) {
                $order->removeShipment($shipment);
            }
        }
    }
}
