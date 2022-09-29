<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Helper\OrderVendorHelper;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ProductVariantInterface;

class OrderVendorHelperSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderVendorHelper::class);
    }

    public function it_returns_true_if_order_has_vendor_items(
        OrderInterface $order,
        OrderItemInterface $orderItem,
        ProductVariantInterface $variant,
        ProductInterface $product
    ): void {
        $order->getItems()->willReturn(new ArrayCollection([$orderItem->getWrappedObject()]));
        $orderItem->getVariant()->willReturn($variant);
        $variant->getProduct()->willReturn($product);
        $product->hasVendor()->willReturn(true);

        $this->orderHasVendorItems($order)->shouldReturn(true);
    }

    public function it_returns_false_if_order_does_not_have_vendor_items(
        OrderInterface $order,
        OrderItemInterface $orderItem,
        ProductVariantInterface $variant,
        ProductInterface $product
    ): void {
        $order->getItems()->willReturn(new ArrayCollection([$orderItem->getWrappedObject()]));
        $orderItem->getVariant()->willReturn($variant);
        $variant->getProduct()->willReturn($product);
        $product->hasVendor()->willReturn(false);

        $this->orderHasVendorItems($order)->shouldReturn(false);
    }

    public function it_returns_false_if_order_does_not_have_shipment_with_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment,
        VendorInterface $vendor
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(false);

        $this->orderHasVendorShipment($order, $vendor)->shouldReturn(false);
    }

    public function it_returns_true_if_order_has_shipment_with_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment,
        VendorInterface $vendor
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(true);
        $shipment->getVendor()->willReturn($vendor);

        $this->orderHasVendorShipment($order, $vendor)->shouldReturn(true);
    }

    public function it_returns_true_if_order_has_shipment_without_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(false);

        $this->orderHasShipmentWithoutVendor($order)->shouldReturn(true);
    }

    public function it_returns_false_if_order_does_not_have_shipment_without_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(true);

        $this->orderHasShipmentWithoutVendor($order)->shouldReturn(false);
    }

    public function it_returns_vendors_from_order_items(
        OrderInterface $order,
        OrderItemInterface $item1,
        OrderItemInterface $item2,
        ProductVariantInterface $variant1,
        ProductVariantInterface $variant2,
        ProductInterface $product1,
        ProductInterface $product2,
        VendorInterface $vendor1,
        VendorInterface $vendor2
    ): void {
        $order->getItems()->willReturn(new ArrayCollection([$item1->getWrappedObject(), $item2->getWrappedObject()]));
        $item1->getVariant()->willReturn($variant1);
        $item2->getVariant()->willReturn($variant2);
        $variant1->getProduct()->willReturn($product1);
        $variant2->getProduct()->willReturn($product2);
        $product1->getVendor()->willReturn($vendor1);
        $product2->getVendor()->willReturn($vendor2);

        $this->getVendorsFromOrder($order)->shouldReturn([$vendor1, $vendor2]);
    }

    public function it_returns_one_vendor_from_order_items(
        OrderInterface $order,
        OrderItemInterface $item1,
        OrderItemInterface $item2,
        ProductVariantInterface $variant1,
        ProductVariantInterface $variant2,
        ProductInterface $product1,
        ProductInterface $product2,
        VendorInterface $vendor1
    ): void {
        $order->getItems()->willReturn(new ArrayCollection([$item1->getWrappedObject(), $item2->getWrappedObject()]));
        $item1->getVariant()->willReturn($variant1);
        $item2->getVariant()->willReturn($variant2);
        $variant1->getProduct()->willReturn($product1);
        $variant2->getProduct()->willReturn($product2);
        $product1->getVendor()->willReturn($vendor1);
        $product2->getVendor()->willReturn(null);

        $this->getVendorsFromOrder($order)->shouldReturn([$vendor1]);
    }

    public function it_returns_no_vendors_from_order_items(
        OrderInterface $order,
        OrderItemInterface $item1,
        OrderItemInterface $item2,
        ProductVariantInterface $variant1,
        ProductVariantInterface $variant2,
        ProductInterface $product1,
        ProductInterface $product2
    ): void {
        $order->getItems()->willReturn(new ArrayCollection([$item1->getWrappedObject(), $item2->getWrappedObject()]));
        $item1->getVariant()->willReturn($variant1);
        $item2->getVariant()->willReturn($variant2);
        $variant1->getProduct()->willReturn($product1);
        $variant2->getProduct()->willReturn($product2);
        $product1->getVendor()->willReturn(null);
        $product2->getVendor()->willReturn(null);

        $this->getVendorsFromOrder($order)->shouldReturn([]);
    }

    public function it_returns_shipment_with_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment,
        VendorInterface $vendor
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(true);
        $shipment->getVendor()->willReturn($vendor);

        $this->getShipmentByVendor($order, $vendor)->shouldReturn($shipment);
    }

    public function it_does_not_return_shipment_with_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment,
        VendorInterface $vendor
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(false);

        $this->getShipmentByVendor($order, $vendor)->shouldReturn(null);
    }

    public function it_returns_shipment_without_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(false);

        $this->getShipmentWithoutVendor($order)->shouldReturn($shipment);
    }

    public function it_does_not_return_shipment_without_vendor(
        OrderInterface $order,
        ShipmentInterface $shipment
    ): void {
        $order->getShipments()->willReturn(new ArrayCollection([$shipment->getWrappedObject()]));
        $shipment->hasVendor()->willReturn(true);

        $this->getShipmentWithoutVendor($order)->shouldReturn(null);
    }
}
