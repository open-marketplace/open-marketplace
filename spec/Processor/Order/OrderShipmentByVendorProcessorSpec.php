<?php

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Processor\Order;

use BitBag\OpenMarketplace\Calculator\ShipmentUnitsRecalculatorInterface;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Processor\Order\OrderShipmentByVendorProcessor;
use BitBag\OpenMarketplace\Processor\Order\OrderShipmentByVendorProcessorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;

class OrderShipmentByVendorProcessorSpec extends ObjectBehavior
{
    public function let(
        ShipmentFactoryInterface $shipmentFactory,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ): void {
        $this->beConstructedWith(
            $shipmentFactory,
            $shipmentUnitsRecalculator
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderShipmentByVendorProcessor::class);
        $this->shouldImplement(OrderShipmentByVendorProcessorInterface::class);
    }

    public function it_does_nothing_because_of_wrong_state(
        OrderInterface $order,
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_NEW);

        $order->isEmpty()->shouldNotBeCalled();
        $order->isShippingRequired()->shouldNotBeCalled();
        $order->hasVendorItems()->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_removes_shipment_because_order_is_empty(
        OrderInterface $order,
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(false);
        $order->removeShipments()->shouldBeCalled();
        $order->hasVendorItems()->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_does_nothing_because_order_does_not_have_vendor_items(
        OrderInterface $order
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(false);
        $order->removeShipments()->shouldBeCalled();
        $order->hasVendorItems()->willReturn(false);
        $order->getVendorsFromOrderItems()->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_adds_vendor_shipment_to_order(
        ShipmentFactoryInterface $shipmentFactory,
        OrderInterface $order,
        ChannelInterface $channel,
        VendorInterface $vendor,
        ShipmentInterface $shipment,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $order->hasVendorItems()->willReturn(true);

        $order->getVendorsFromOrderItems()->willReturn([], [$vendor]);
        $order->hasShipmentWithoutVendor()->willReturn(true);
        $order->hasVendorShipment($vendor)->willReturn(false);
        $shipmentFactory
            ->tryCreateNewWithOrderVendorAndDefaultShipment($order, $vendor)
            ->willReturn($shipment)
        ;
        $order->addShipment($shipment)->shouldBeCalled();
        $order->getShipments()->willReturn(new ArrayCollection());
        $order->getShipmentWithoutVendor()->willReturn(null);
        $shipmentUnitsRecalculator->recalculateShipmentUnits($order)->shouldBeCalled();

        $this->process($order);
    }

    public function it_removes_shipment_with_missing_vendor(
        OrderInterface $order,
        ChannelInterface $channel,
        VendorInterface $vendor,
        ShipmentInterface $shipment,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $order->hasVendorItems()->willReturn(true);

        $order->getVendorsFromOrderItems()->willReturn([]);
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]), new ArrayCollection());
        $shipment->getVendor()->willReturn($vendor);
        $order->removeShipment($shipment)->shouldBeCalled();

        $shipmentUnitsRecalculator->recalculateShipmentUnits($order)->shouldBeCalled();
        $order->hasShipmentWithoutVendor()->willReturn(true);
        $order->hasVendorShipment($vendor)->willReturn(false);
        $order->getItemUnits()->willReturn(new ArrayCollection());
        $order->getShipmentWithoutVendor()->willReturn(null);

        $this->process($order);
    }

    public function it_adds_shipment_without_vendor(
        ShipmentFactoryInterface $shipmentFactory,
        OrderInterface $order,
        ChannelInterface $channel,
        ShipmentInterface $shipment,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $order->hasVendorItems()->willReturn(true);

        $order->getVendorsFromOrderItems()->willReturn([]);
        $order->getShipments()->willReturn(new ArrayCollection());
        $order->hasShipmentWithoutVendor()->willReturn(false);
        $shipmentFactory
            ->tryCreateNewWithOrderVendorAndDefaultShipment($order, null)
            ->willReturn($shipment)
        ;
        $order->addShipment($shipment)->shouldBeCalled();

        $shipmentUnitsRecalculator->recalculateShipmentUnits($order)->shouldBeCalled();
        $order->getItemUnits()->willReturn(new ArrayCollection());
        $order->getShipmentWithoutVendor()->willReturn($shipment);
        $shipment->getUnits()->willReturn(new ArrayCollection());
        $order->removeShipment($shipment)->shouldBeCalled();

        $this->process($order);
    }
}
