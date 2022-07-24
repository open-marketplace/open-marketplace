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

    private array $secondaryOrders;

    public function __construct(
        EntityManager $entityManager,
        OrderClonerInterface $orderCloner,
        OrderItemClonerInterface $orderItemCloner
    ) {
        $this->entityManager = $entityManager;
        $this->orderCloner = $orderCloner;
        $this->orderItemCloner = $orderItemCloner;
    }

    public function process(OrderInterface $order): array
    {
//        $this->secondaryOrders = [];
        $this->secondaryOrders[] = $order;

        /** @var array<OrderItemInterface> $orderItems */
        $orderItems = $order->getItems();
        foreach ($orderItems as $item) {
            $itemVendor = $this->getVendorFromOrderItem($item);
            if ($this->vendorSecondaryOrderExits($this->secondaryOrders, $itemVendor)) {
                $this->addItemIntoSecondaryOrder($this->secondaryOrders, $itemVendor, $item);
            } else {
                $this->secondaryOrders[] = $this->generateNewSecondaryOrder($order, $itemVendor, $item);
            }
        }

        foreach ($this->secondaryOrders as $secondaryOrder) {
            $secondaryOrder->recalculateItemsTotal();
            $secondaryOrder->recalculateAdjustmentsTotal();
            $payment = $secondaryOrder->getPayments()[0];
            if ($payment) {
                $payment->setAmount($secondaryOrder->getTotal());
                $this->entityManager->persist($payment);
            }
        }
        $this->entityManager->persist($order);
        $this->entityManager->flush();

        return $this->secondaryOrders;
    }

    private function vendorSecondaryOrderExits(array $secondaryOrders, VendorInterface $vendor): bool
    {
        foreach ($secondaryOrders as $secondaryOrder) {
            if ($secondaryOrder->getVendor() === $vendor) {
                return true;
            }
        }

        return false;
    }

    private function getVendorSecondaryOrder(array $secondaryOrders, VendorInterface $vendor): ?OrderInterface
    {
        foreach ($secondaryOrders as $secondaryOrder) {
            if ($secondaryOrder->getVendor() === $vendor) {
                return $secondaryOrder;
            }
        }

        return null;
    }

    private function cloneItemIntoSecondaryOrder(
        OrderItemInterface $item,
        OrderInterface $order,
        ?ShipmentInterface $shipment
    ): void {
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

    private function generateNewSecondaryOrder(
        OrderInterface $order,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): OrderInterface {
        $newOrder = new Order();
        $this->orderCloner->clone($order, $newOrder);
        $newOrder->setVendor($itemVendor);
        $newOrder->setPrimaryOrder($order);
        $this->entityManager->persist($newOrder);
        if ($newOrder->getShipments()[0]) {
            $this->cloneItemIntoSecondaryOrder($item, $newOrder, $newOrder->getShipments()[0]);
        }

        return $newOrder;
    }

    private function addItemIntoSecondaryOrder(
        array $secondaryOrders, VendorInterface $itemVendor, OrderItemInterface $item
    ): void {
        /** @var OrderInterface $secondaryOrder */
        $secondaryOrder = $this->getVendorSecondaryOrder($secondaryOrders, $itemVendor);
        /** @var ShipmentInterface $shipments */
        $shipments = $secondaryOrder->getShipments()[0];
        $this->cloneItemIntoSecondaryOrder($item, $secondaryOrder, $shipments);
    }

    /**
     * @return array
     */
    public function getSecondaryOrdersCount(): int
    {
        return count($this->secondaryOrders);
    }


}
