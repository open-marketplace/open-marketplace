<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Calculator;

use BitBag\OpenMarketplace\Calculator\ShipmentUnitsRecalculator;
use BitBag\OpenMarketplace\Calculator\ShipmentUnitsRecalculatorInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\OrderItemUnitInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

final class ShipmentUnitsRecalculatorSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShipmentUnitsRecalculator::class);
        $this->shouldImplement(ShipmentUnitsRecalculatorInterface::class);
    }

    public function it_removes_units_from_shipments(
        OrderInterface $order,
        ShipmentInterface $shipment,
        OrderItemUnitInterface $unit
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->getUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $shipment->removeUnit($unit)->shouldBeCalled();
        $order->getItemUnits()->willReturn(new ArrayCollection());

        $this->recalculateShipmentUnits($order);
    }

    public function it_removes_units_from_shipments_and_adds_them_back_with_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment,
        OrderItemUnitInterface $unit,
        OrderItemInterface $orderItem,
        ProductVariantInterface $variant,
        ProductInterface $product,
        VendorInterface $vendor
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->getUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $shipment->removeUnit($unit)->shouldBeCalled();
        $order->getItemUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $unit->getOrderItem()->willReturn($orderItem);
        $orderItem->getVariant()->willReturn($variant);
        $variant->getProduct()->willReturn($product);
        $unit->getShipment()->willReturn(null);
        $product->getVendor()->willReturn($vendor);
        $order->getShipmentByVendor($vendor)->willReturn($shipment);
        $shipment->addUnit($unit)->shouldBeCalled();

        $this->recalculateShipmentUnits($order);
    }

    public function it_removes_units_from_shipments_and_adds_them_back_without_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment,
        OrderItemUnitInterface $unit,
        OrderItemInterface $orderItem,
        ProductVariantInterface $variant,
        ProductInterface $product,
        VendorInterface $vendor,
        ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->getUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $shipment->removeUnit($unit)->shouldBeCalled();
        $order->getItemUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $unit->getOrderItem()->willReturn($orderItem);
        $orderItem->getVariant()->willReturn($variant);
        $variant->getProduct()->willReturn($product);
        $unit->getShipment()->willReturn(null);
        $product->getVendor()->willReturn($vendor);
        $order->getShipmentByVendor($vendor)->willReturn($shipment);
        $shipment->addUnit($unit)->shouldBeCalled();

        $this->recalculateShipmentUnits($order);
    }
}
