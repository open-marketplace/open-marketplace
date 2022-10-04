<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Manager;

use BitBag\OpenMarketplace\Cloner\OrderClonerInterface;
use BitBag\OpenMarketplace\Cloner\OrderItemClonerInterface;
use BitBag\OpenMarketplace\Cloner\ShipmentClonerInterface;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\ShipmentInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\OrderFactoryInterface;
use BitBag\OpenMarketplace\Factory\OrderItemFactoryInterface;
use BitBag\OpenMarketplace\Helper\OrderVendorHelperInterface;
use BitBag\OpenMarketplace\Manager\OrderManager;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;

final class OrderManagerSpec extends ObjectBehavior
{
//    public function let(
//        OrderFactoryInterface $factory,
//        OrderClonerInterface $cloner,
//        ShipmentClonerInterface $shipmentCloner,
//        EntityManager $entityManager,
//        OrderItemClonerInterface $orderItemCloner,
//        OrderItemFactoryInterface $itemFactory,
//        OrderVendorHelperInterface $vendorHelper
//    ): void {
//        $this
//            ->beConstructedWith(
//                $factory,
//                $cloner,
//                $shipmentCloner,
//                $entityManager,
//                $orderItemCloner,
//                $itemFactory,
//                $vendorHelper
//            )
//        ;
//    }
//
//    public function it_is_initializable(): void
//    {
//        $this->shouldHaveType(OrderManager::class);
//    }
//
//    public function it_generate_order_with_given_item(
//        OrderInterface $order,
//        OrderItemInterface $orderItem,
//        VendorInterface $itemVendor,
//        OrderInterface $newOrder,
//        OrderFactoryInterface $factory,
//        OrderItemFactoryInterface $itemFactory,
//        ShipmentInterface $shipment,
//        OrderItemInterface $newItem,
//        OrderVendorHelperInterface $vendorHelper
//    ): void {
//        $factory->createNew()->willReturn($newOrder);
//        $itemFactory->createNew()->willReturn($newItem);
//        $vendorHelper->getShipmentByVendor($order, $itemVendor)->willReturn($shipment);
//
//        $this->generateNewSecondaryOrder($order, $itemVendor, $orderItem)->shouldReturn($newOrder);
//
//        $newOrder->addItem($newItem)->shouldHaveBeenCalledTimes(1);
//        $newOrder->setVendor($itemVendor)->shouldHaveBeenCalledTimes(1);
//        $newOrder->setPrimaryOrder($order)->shouldHaveBeenCalledTimes(1);
//    }
//
//    public function it_adds_item_into_order(
//        OrderInterface $order,
//        OrderInterface $order2,
//        OrderItemInterface $orderItem,
//        VendorInterface $itemVendor,
//        OrderItemFactoryInterface $itemFactory,
//        ShipmentInterface $shipment,
//        OrderItemInterface $newItem,
//        ): void {
//        $orders = [$order, $order2];
//        $shipments = new ArrayCollection([$shipment->getWrappedObject()]);
//        $itemFactory->createNew()->willReturn($newItem);
//
//        $order->getVendor()->willReturn($itemVendor);
//        $order->getShipments()->willReturn($shipments);
//
//        $order->addItem($newItem)->shouldBeCalledOnce();
//
//        $this->addItemIntoSecondaryOrder($orders, $itemVendor, $orderItem);
//    }
}
