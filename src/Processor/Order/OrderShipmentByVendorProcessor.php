<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Helper\OrderVendorHelperInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\VendorShippingMethodsResolverInterface;
use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Resolver\DefaultShippingMethodResolverInterface;

final class OrderShipmentByVendorProcessor implements OrderProcessorInterface, OrderShipmentByVendorProcessorInterface
{
    private VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver;

    private DefaultShippingMethodResolverInterface $defaultShippingMethodResolver;

    private FactoryInterface $shipmentFactory;

    private OrderVendorHelperInterface $orderVendorHelper;

    public function __construct(
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver,
        FactoryInterface $shipmentFactory,
        OrderVendorHelperInterface $orderVendorHelper
    ) {
        $this->defaultVendorShippingMethodResolver = $defaultVendorShippingMethodResolver;
        $this->defaultShippingMethodResolver = $defaultShippingMethodResolver;
        $this->shipmentFactory = $shipmentFactory;
        $this->orderVendorHelper = $orderVendorHelper;
    }

    /**
     * @param OrderInterface $order
     */
    public function process(BaseOrderInterface $order): void
    {
        if (BaseOrderInterface::STATE_CART !== $order->getState()) {
            return;
        }

        if ($order->isEmpty() || !$order->isShippingRequired()) {
            $order->removeShipments();

            return;
        }

        if (false === $this->orderVendorHelper->orderHasVendorItems($order)) {
            return;
        }

        $this->removeShipmentsWithMissingVendors($order);

        $this->addShipmentsPerVendor($order);

        $this->recalculateShipmentUnits($order);

        $this->removeShipmentWithoutVendorIfEmpty($order);
    }

    private function removeShipmentsWithMissingVendors(OrderInterface $order): void
    {
        $vendors = $this->orderVendorHelper->getVendorsFromOrder($order);
        /** @var ShipmentInterface $shipment */
        foreach ($order->getShipments() as $shipment) {
            if (false === in_array($shipment->getVendor(), $vendors)) {
                $order->removeShipment($shipment);
            }
        }
    }

    private function addShipmentsPerVendor(OrderInterface $order): void
    {
        $vendors = $this->orderVendorHelper->getVendorsFromOrder($order);

        if (false === $this->orderVendorHelper->orderHasShipmentWithoutVendor($order)) {
            $this->addShipment($order, null);
        }

        foreach ($vendors as $vendor) {
            if ($this->orderVendorHelper->orderHasVendorShipment($order, $vendor)) {
                continue;
            }

            $this->addShipment($order, $vendor);
        }
    }

    private function addShipment(OrderInterface $order, ?VendorInterface $vendor): void
    {
        try {
            /** @var ShipmentInterface $shipment */
            $shipment = $this->shipmentFactory->createNew();
            $shipment->setOrder($order);
            $defaultShippingMethod = null;

            if (null !== $vendor) {
                $shipment->setVendor($vendor);

                $defaultVendorShippingMethod = $this
                    ->defaultVendorShippingMethodResolver
                    ->getDefaultShippingMethod($vendor, $order->getChannel());
                $defaultShippingMethod = $defaultVendorShippingMethod->getShippingMethod();
            } else {
                $defaultShippingMethod = $this->defaultShippingMethodResolver->getDefaultShippingMethod($shipment);
            }

            $shipment->setMethod($defaultShippingMethod);
            $order->addShipment($shipment);
        } catch (UnresolvedDefaultShippingMethodException) {
        }
    }

    private function recalculateShipmentUnits(OrderInterface $order): void
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
                    $shipment = $this->orderVendorHelper->getShipmentByVendor($order, $product->getVendor());
                } else {
                    $shipment = $this->orderVendorHelper->getShipmentWithoutVendor($order);
                }

                $shipment?->addUnit($itemUnit);
            }
        }
    }

    private function removeShipmentWithoutVendorIfEmpty(OrderInterface $order): void
    {
        $shipment = $this->orderVendorHelper->getShipmentWithoutVendor($order);

        if (null !== $shipment) {
            if ($shipment->getUnits()->isEmpty()) {
                $order->removeShipment($shipment);
            }
        }
    }
}
