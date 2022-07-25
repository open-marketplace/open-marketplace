<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderItemClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderItemFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Manager\OrderManagerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order\SplitOrderByVendorProcessor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

final class SplitOrderByVendorProcessorSpec extends ObjectBehavior
{
    public function let(
        EntityManager $entityManager,
        OrderClonerInterface $orderCloner,
        OrderItemClonerInterface $orderItemCloner,
        OrderFactoryInterface $factory,
        OrderItemFactoryInterface $itemFactory,
        OrderManagerInterface $orderManager,
        VendorProviderInterface $vendorProvider
    ): void {
        $this->beConstructedWith($entityManager, $orderCloner, $orderItemCloner, $factory, $itemFactory, $orderManager, $vendorProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SplitOrderByVendorProcessor::class);
    }

    public function it_always_create_at_least_one_secondary_order(
        OrderInterface $order,
        PaymentInterface $payment,
        \BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface $orderItem,
        OrderInterface $subOrder,
        VendorInterface $vendor,
        \Sylius\Component\Core\Model\ProductInterface $product,
        VendorProviderInterface $vendorProvider,
        OrderManagerInterface $orderManager,
    ): void {
        $orderItemCollection = new ArrayCollection([$orderItem->getWrappedObject()]);
        $paymentCollection = new ArrayCollection([$payment->getWrappedObject()]);
        $order->getItems()->willReturn($orderItemCollection);
        $orderItem->getProductOwner()->willReturn($vendor);
        $order->getPayments()->willReturn($paymentCollection);
        $order->getTotal()->willReturn(100);
        $orderManager->generateNewSecondaryOrder($order, $vendor, $orderItem)->willReturn($subOrder);
//        $orderItem->getProductOwner()->willReturn($vendor);
        $this->process($order);

        $this->getSecondaryOrdersCount()->shouldReturn(2);

        $order->recalculateItemsTotal()->shouldHaveBeenCalled();
        $order->recalculateAdjustmentsTotal()->shouldHaveBeenCalled();
    }

//    public function it_create_2_secondary_orders_when_gets_products_from_2_vendors(
//        OrderInterface $order,
//        PaymentInterface $payment,
//        OrderItemInterface $orderItem,
//        OrderItemInterface $orderItem2,
//        VendorInterface $vendor,
//        VendorInterface $vendor2,
//    ): void {
//        $orderItemCollection = new ArrayCollection([$orderItem->getWrappedObject(),$orderItem2->getWrappedObject()]);
//        $paymentCollection = new ArrayCollection([$payment->getWrappedObject()]);
//        $order->getItems()->willReturn($orderItemCollection);
//
////        $orderItem->getProductOwner()->willReturn($vendor);
////        $orderItem2->getProductOwner()->willReturn($vendor2);
//        $order->getPayments()->willReturn($paymentCollection);
//        $order->getTotal()->willReturn(100);
//        $order->getVendor()->willReturn(null);
//
////        $orderItem->getProductOwner()->willReturn($vendor);
//        $this->process($order);
//
//        $this->getSecondaryOrdersCount()->shouldReturn(3);
//
//        $order->recalculateItemsTotal()->shouldHaveBeenCalled();
//        $order->recalculateAdjustmentsTotal()->shouldHaveBeenCalled();
//    }
//
//    public function it_recalculates_payment_for_each_suborder(
//        OrderInterface $order,
//        PaymentInterface $payment,
//        OrderItemInterface $orderItem,
//        OrderItemInterface $orderItem2,
//        VendorInterface $vendor,
//        VendorInterface $vendor2,
//    ): void {
//        $orderItemCollection = new ArrayCollection([$orderItem->getWrappedObject(),$orderItem2->getWrappedObject()]);
//        $paymentCollection = new ArrayCollection([$payment->getWrappedObject()]);
//        $order->getItems()->willReturn($orderItemCollection);
//
//        $orderItem->getProductOwner()->willReturn($vendor);
//        $orderItem2->getProductOwner()->willReturn($vendor2);
//        $order->getPayments()->willReturn($paymentCollection);
//        $order->getTotal()->willReturn(100);
//        $order->getVendor()->willReturn(null);
//
//        $orderItem->getProductOwner()->willReturn($vendor);
//        $this->process($order);
//
//
////        $this->getSecondaryOrdersCount()->shouldReturn(3);
////
//        $order->recalculateItemsTotal()->shouldHaveBeenCalled();
//        $order->recalculateAdjustmentsTotal()->shouldHaveBeenCalled();
//
//
//    }
}
