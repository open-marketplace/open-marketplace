<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Processor\Order;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderItemClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Order;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Model\VendorOrderCollector;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\OrderItem;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\ProductVariant;
use Sylius\Component\Core\Model\ShipmentInterface;

class SplitOrderByVendorProcessor implements SplitOrderByVendorProcessorInterface
{
    private EntityManager $entityManager;

    private OrderClonerInterface $orderCloner;

    private OrderItemClonerInterface $orderItemCloner;

    public function __construct(
        EntityManager $entityManager,
        OrderClonerInterface $orderCloner,
        OrderItemClonerInterface $orderItemCloner
    ) {
        $this->entityManager = $entityManager;
        $this->orderCloner = $orderCloner;
        $this->orderItemCloner = $orderItemCloner;
    }

    /** @returns Array<VendorOrderCollector> */
    public function process(OrderInterface $order): array
    {
        $subOrders = [];
        $subOrders[] = $order;
        /** @var array<OrderItemInterface> $orderItems */
        $orderItems = $order->getItems();
        foreach ($orderItems as $item) {
            $itemVendor = $this->getVendorFromOrderItem($item);
            if($this->vendorSuborderExits($subOrders, $itemVendor)){
                $subOrder = $this->getVendorSuborder($subOrders, $itemVendor);
                $this->cloneItemIntoSuborder($item, $subOrder, $subOrder->getShipments()[0]);
            }
            else{
                $newOrder = new Order();
                $this->orderCloner->clone($order, $newOrder);
                $newOrder->setVendor($itemVendor);
                $newOrder->setPrimaryOrder($order);
                $this->entityManager->persist($newOrder);

                $this->cloneItemIntoSuborder($item, $newOrder, $newOrder->getShipments()[0]);
                $subOrders[] = $newOrder;
            }
        }
        foreach ($subOrders as $subOrder) {
            $subOrder->recalculateItemsTotal();
            $subOrder->recalculateAdjustmentsTotal();
            $payment = $subOrder->getPayments()[0];
            $payment->setAmount($subOrder->getTotal());
            $this->entityManager->persist($payment);

        }
        $this->entityManager->persist($order);
        return $subOrders;
    }
    private function vendorSuborderExits($suborders, $vendor): bool
    {
        foreach ($suborders as $suborder){
            if($suborder->getVendor() === $vendor)
                return true;
        }
        return false;
    }

    private function getVendorSuborder($suborders, $vendor): ?OrderInterface
    {
        foreach ($suborders as $suborder){
            if($suborder->getVendor() === $vendor)
                return $suborder;
        }
        return null;
    }
    private function cloneItemIntoSuborder(OrderItemInterface $item, OrderInterface $order, ShipmentInterface $shipment): void
    {
        $newItem = new OrderItem();
        $this->orderItemCloner->clone($item, $newItem, $shipment);
        $order->addItem($newItem);
    }

    private function getVendorFromOrderItem(OrderItemInterface $orderItem): VendorInterface
    {
        /** @var ProductVariant $variant */
        $variant = $orderItem->getVariant();
        /** @var ProductInterface $product */
        $product = $variant->getProduct();
        /** @var VendorInterface $vendor */
        $vendor = $product->getVendor();

        return $vendor;
    }
}
