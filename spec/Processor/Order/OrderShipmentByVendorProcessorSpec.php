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
        $order->getVendorsFromOrderItems()->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_removes_shipment_because_order_is_empty(
        OrderInterface $order,
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(false);
        $order->removeShipments()->shouldBeCalled();
        $order->getVendorsFromOrderItems()->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_adds_vendor_shipment_to_order(
        ShipmentFactoryInterface $shipmentFactory,
        OrderInterface $order,
        VendorInterface $vendor,
        ShipmentInterface $shipment,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();

        $order->getVendorsFromOrderItems()->willReturn([$vendor]);

        $order->getShipmentWithoutVendor()->willReturn(null);

        $order->hasVendorShipment($vendor)->willReturn(false);
        $order->hasShippableItemsWithVendor($vendor)->willReturn(true);

        $order->addShipment($shipment)->shouldBeCalled();

        $shipmentFactory
            ->tryCreateNewWithOrderVendorAndDefaultShipment($order, $vendor)
            ->willReturn($shipment)
        ;

        $order->getShipments()->willReturn(new ArrayCollection());

        $shipmentUnitsRecalculator->recalculateShipmentUnits($order)->shouldBeCalled();

        $this->process($order);
    }

    public function it_adds_shipment_for_items_without_vendor(
        ShipmentFactoryInterface $shipmentFactory,
        OrderInterface $order,
        ShipmentInterface $shipment,
        ShipmentUnitsRecalculatorInterface $shipmentUnitsRecalculator
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();

        $order->getVendorsFromOrderItems()->willReturn([null]);

        $order->hasVendorShipment(null)->willReturn(false);
        $order->hasShippableItemsWithVendor(null)->willReturn(true);
        $order->addShipment($shipment)->shouldBeCalled();

        $order->getShipments()->willReturn(new ArrayCollection());

        $shipmentFactory
            ->tryCreateNewWithOrderVendorAndDefaultShipment($order, null)
            ->willReturn($shipment)
        ;

        $shipmentUnitsRecalculator->recalculateShipmentUnits($order)->shouldBeCalled();

        $order->getShipmentWithoutVendor()->willReturn(null);

        $this->process($order);
    }
}
