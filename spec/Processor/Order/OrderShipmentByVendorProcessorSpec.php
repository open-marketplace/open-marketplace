<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorShippingMethodInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Helper\OrderVendorHelperInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order\OrderShipmentByVendorProcessor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order\OrderShipmentByVendorProcessorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Resolver\VendorShippingMethodsResolverInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderItemUnitInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Core\Model\ShippingMethodInterface;
use Sylius\Component\Order\Model\OrderInterface as BaseOrderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Shipping\Exception\UnresolvedDefaultShippingMethodException;
use Sylius\Component\Shipping\Resolver\DefaultShippingMethodResolverInterface;

class OrderShipmentByVendorProcessorSpec extends ObjectBehavior
{
    public function let(
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver,
        FactoryInterface $shipmentFactory,
        OrderVendorHelperInterface $orderVendorHelper,
        ): void {
        $this->beConstructedWith(
            $defaultVendorShippingMethodResolver,
            $defaultShippingMethodResolver,
            $shipmentFactory,
            $orderVendorHelper
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderShipmentByVendorProcessor::class);
        $this->shouldImplement(OrderShipmentByVendorProcessorInterface::class);
    }

    public function it_does_nothing_because_of_wrong_state(
        OrderInterface $order,
        OrderVendorHelperInterface $orderVendorHelper
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_NEW);

        $order->isEmpty()->shouldNotBeCalled();
        $order->isShippingRequired()->shouldNotBeCalled();
        $orderVendorHelper->orderHasVendorItems($order)->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_removes_shipment_because_order_is_empty(
        OrderInterface $order,
        OrderVendorHelperInterface $orderVendorHelper
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(false);
        $order->removeShipments()->shouldBeCalled();
        $orderVendorHelper->orderHasVendorItems($order)->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_does_nothing_because_order_does_not_have_vendor_items(
        OrderInterface $order,
        OrderVendorHelperInterface $orderVendorHelper
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(false);
        $order->removeShipments()->shouldBeCalled();
        $orderVendorHelper->orderHasVendorItems($order)->willReturn(false);
        $orderVendorHelper->getVendorsFromOrder($order)->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_adds_vendor_shipment_to_order(
        OrderVendorHelperInterface $orderVendorHelper,
        FactoryInterface $shipmentFactory,
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        OrderInterface $order,
        ChannelInterface $channel,
        VendorInterface $vendor,
        ShipmentInterface $shipment,
        VendorShippingMethodInterface $vendorShippingMethod,
        ShippingMethodInterface $shippingMethod,
        OrderItemUnitInterface $unit,
        OrderItemInterface $orderItem,
        ProductVariantInterface $variant,
        ProductInterface $product
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $orderVendorHelper->orderHasVendorItems($order)->willReturn(true);

        $orderVendorHelper->getVendorsFromOrder($order)->willReturn([], [$vendor]);
        $orderVendorHelper->orderHasShipmentWithoutVendor($order)->willReturn(true);
        $orderVendorHelper->orderHasVendorShipment($order, $vendor)->willReturn(false);
        $shipmentFactory->createNew()->willReturn($shipment);
        $shipment->setOrder($order)->shouldBeCalled();
        $shipment->setVendor($vendor)->shouldBeCalled();
        $vendorShippingMethod->getShippingMethod()->willReturn($shippingMethod);
        $defaultVendorShippingMethodResolver
            ->getDefaultShippingMethod($vendor, $channel)
            ->willReturn($vendorShippingMethod)
        ;
        $shipment->setMethod($shippingMethod)->shouldBeCalled();
        $order->addShipment($shipment)->shouldBeCalled();
        $order->getShipments()->willReturn(new ArrayCollection(), new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->getUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $shipment->removeUnit($unit)->shouldBeCalled();
        $order->getItemUnits()->willReturn(new ArrayCollection([$unit->getWrappedObject()]));
        $unit->getOrderItem()->willReturn($orderItem);
        $orderItem->getVariant()->willReturn($variant);
        $variant->getProduct()->willReturn($product);
        $unit->getShipment()->willReturn(null);
        $product->hasVendor()->willReturn(true);
        $product->getVendor()->willReturn($vendor);
        $orderVendorHelper->getShipmentByVendor($order, $vendor);
        $shipment->addUnit($unit);
        $orderVendorHelper->getShipmentWithoutVendor($order)->willReturn(null);

        $this->process($order);
    }

    public function it_removes_shipment_with_missing_vendor(
        OrderVendorHelperInterface $orderVendorHelper,
        OrderInterface $order,
        ChannelInterface $channel,
        VendorInterface $vendor,
        ShipmentInterface $shipment
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $orderVendorHelper->orderHasVendorItems($order)->willReturn(true);

        $orderVendorHelper->getVendorsFromOrder($order)->willReturn([]);
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]), new ArrayCollection());
        $shipment->getVendor()->willReturn($vendor);
        $order->removeShipment($shipment)->shouldBeCalled();

        $orderVendorHelper->orderHasShipmentWithoutVendor($order)->willReturn(true);
        $orderVendorHelper->orderHasVendorShipment($order, $vendor)->willReturn(false);
        $order->getItemUnits()->willReturn(new ArrayCollection());
        $orderVendorHelper->getShipmentWithoutVendor($order)->willReturn(null);

        $this->process($order);
    }

    public function it_adds_shipment_without_vendor(
        OrderVendorHelperInterface $orderVendorHelper,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver,
        FactoryInterface $shipmentFactory,
        OrderInterface $order,
        ChannelInterface $channel,
        ShipmentInterface $shipment,
        ShippingMethodInterface $shippingMethod
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $orderVendorHelper->orderHasVendorItems($order)->willReturn(true);

        $orderVendorHelper->getVendorsFromOrder($order)->willReturn([]);
        $order->getShipments()->willReturn(new ArrayCollection());
        $orderVendorHelper->orderHasShipmentWithoutVendor($order)->willReturn(false);
        $shipmentFactory->createNew()->willReturn($shipment);
        $shipment->setOrder($order)->shouldBeCalled();
        $defaultShippingMethodResolver->getDefaultShippingMethod($shipment)->willReturn($shippingMethod);
        $shipment->setMethod($shippingMethod)->shouldBeCalled();
        $order->addShipment($shipment)->shouldBeCalled();

        $order->getItemUnits()->willReturn(new ArrayCollection());
        $orderVendorHelper->getShipmentWithoutVendor($order)->willReturn($shipment);
        $shipment->getUnits()->willReturn(new ArrayCollection());
        $order->removeShipment($shipment)->shouldBeCalled();

        $this->process($order);
    }

    public function it_throws_exception_due_to_lack_of_default_shipping_method_without_vendor(
        OrderVendorHelperInterface $orderVendorHelper,
        DefaultShippingMethodResolverInterface $defaultShippingMethodResolver,
        FactoryInterface $shipmentFactory,
        OrderInterface $order,
        ChannelInterface $channel,
        ShipmentInterface $shipment,
        ShippingMethodInterface $shippingMethod
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $orderVendorHelper->orderHasVendorItems($order)->willReturn(true);

        $orderVendorHelper->getVendorsFromOrder($order)->willReturn([]);
        $order->getShipments()->willReturn(new ArrayCollection());
        $orderVendorHelper->orderHasShipmentWithoutVendor($order)->willReturn(false);
        $shipmentFactory->createNew()->willReturn($shipment);
        $shipment->setOrder($order)->shouldBeCalled();
        $defaultShippingMethodResolver
            ->getDefaultShippingMethod($shipment)
            ->willThrow(new UnresolvedDefaultShippingMethodException())
        ;
        $shipment->setMethod($shippingMethod)->shouldNotBeCalled();
        $order->addShipment($shipment)->shouldNotBeCalled();

        $order->getItemUnits()->willReturn(new ArrayCollection());
        $orderVendorHelper->getShipmentWithoutVendor($order)->willReturn(null);
        $shipment->getUnits()->willReturn(new ArrayCollection());
        $order->removeShipment($shipment)->shouldNotBeCalled();

        $this->process($order);
    }

    public function it_throws_exception_due_to_lack_of_default_shipping_method_with_vendor(
        OrderVendorHelperInterface $orderVendorHelper,
        VendorShippingMethodsResolverInterface $defaultVendorShippingMethodResolver,
        FactoryInterface $shipmentFactory,
        OrderInterface $order,
        ChannelInterface $channel,
        ShipmentInterface $shipment,
        ShippingMethodInterface $shippingMethod,
        VendorInterface $vendor
    ): void {
        $order->getState()->willReturn(BaseOrderInterface::STATE_CART);

        $order->isEmpty()->willReturn(false);
        $order->isShippingRequired()->willReturn(true);
        $order->removeShipments()->shouldNotBeCalled();
        $order->getChannel()->willReturn($channel);
        $orderVendorHelper->orderHasVendorItems($order)->willReturn(true);

        $orderVendorHelper->getVendorsFromOrder($order)->willReturn([$vendor]);
        $orderVendorHelper->orderHasVendorShipment($order, $vendor)->willReturn(false);
        $order->getShipments()->willReturn(new ArrayCollection());
        $orderVendorHelper->orderHasShipmentWithoutVendor($order)->willReturn(true);
        $shipmentFactory->createNew()->willReturn($shipment);
        $shipment->setOrder($order)->shouldBeCalled();
        $shipment->setVendor($vendor)->shouldBeCalled();
        $defaultVendorShippingMethodResolver
            ->getDefaultShippingMethod($vendor, $channel)
            ->willThrow(new UnresolvedDefaultShippingMethodException())
        ;
        $shipment->setMethod($shippingMethod)->shouldNotBeCalled();
        $order->addShipment($shipment)->shouldNotBeCalled();

        $order->getItemUnits()->willReturn(new ArrayCollection());
        $orderVendorHelper->getShipmentWithoutVendor($order)->willReturn(null);
        $shipment->getUnits()->willReturn(new ArrayCollection());
        $order->removeShipment($shipment)->shouldNotBeCalled();

        $this->process($order);
    }
}
