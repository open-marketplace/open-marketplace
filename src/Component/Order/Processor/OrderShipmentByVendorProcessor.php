<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Processor;

use BitBag\OpenMarketplace\Calculator\ShipmentUnitsRecalculatorInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
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

        $this->addShipmentsPerVendor($order);

        $this->shipmentUnitsRecalculator->recalculateShipmentUnits($order);
    }

    private function addShipmentsPerVendor(OrderInterface $order): void
    {
        $vendors = $order->getVendorsFromOrderItems();

        foreach ($vendors as $vendor) {
            if (true === $order->hasVendorShipment($vendor) || false === $order->hasShippableItemsWithVendor($vendor)) {
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
            ->tryCreateNewWithOrderVendorAndDefaultShipment($order, $vendor);

        if (null !== $shipment) {
            $order->addShipment($shipment);
        }
    }
}
