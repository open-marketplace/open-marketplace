<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Processor\Order;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Resolver\VendorShippingMethodsResolverInterface;
use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Resolver\DefaultShippingMethodResolverInterface;
use Webmozart\Assert\Assert;

final class OrderShipmentByVendorProcessor implements OrderProcessorInterface, OrderShipmentByVendorProcessorInterface
{
    private VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver;

    private DefaultShippingMethodResolverInterface $defaultShippingMethodResolver;

    private FactoryInterface $shipmentFactory;

    public function __construct(
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver,
        FactoryInterface $shipmentFactory
    ) {
        $this->defaultVendorShippingMethodResolver = $defaultVendorShippingMethodResolver;
        $this->defaultShippingMethodResolver = $defaultShippingMethodResolver;
        $this->shipmentFactory = $shipmentFactory;
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

        $this->recalculateShipmentUnits($order);

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
                    $shipment = $order->getShipmentByVendor($product->getVendor());
                } else {
                    $shipment = $order->getShipmentWithoutVendor();
                }

                $shipment?->addUnit($itemUnit);
            }
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
