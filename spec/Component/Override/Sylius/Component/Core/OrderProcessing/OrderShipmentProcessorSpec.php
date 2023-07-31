<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Override\Sylius\Component\Core\OrderProcessing;

use BitBag\OpenMarketplace\Component\Order\Calculator\ShipmentUnitsRecalculatorInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Component\Order\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Component\Override\Sylius\Component\Core\OrderProcessing\OrderShipmentProcessor;
use BitBag\OpenMarketplace\Component\Override\Sylius\Component\Core\OrderProcessing\OrderShipmentProcessorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;

class OrderShipmentProcessorSpec extends ObjectBehavior
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
        $this->shouldHaveType(OrderShipmentProcessor::class);
        $this->shouldImplement(OrderShipmentProcessorInterface::class);
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

        $order->hasVendorShipment($vendor)->willReturn(false);
        $order->hasShippableItemsWithVendor($vendor)->willReturn(true);

        $shipmentFactory
            ->tryCreateNewWithOrderVendorAndDefaultShipment($order, $vendor)
            ->willReturn($shipment)
        ;
        $order->addShipment($shipment)->shouldBeCalled();

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
