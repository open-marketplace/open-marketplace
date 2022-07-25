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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderItemFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderItemFactoryInterface;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\OrderItem;
use Sylius\Component\Core\Model\ShipmentInterface;

class SplitOrderByVendorProcessor implements SplitOrderByVendorProcessorInterface
{
    private EntityManager $entityManager;

    private OrderClonerInterface $orderCloner;

    private OrderItemClonerInterface $orderItemCloner;

    private array $secondaryOrders;

    private OrderFactoryInterface $factory;

    private OrderItemFactoryInterface $itemFactory;

    public function __construct(
        EntityManager $entityManager,
        OrderClonerInterface $orderCloner,
        OrderItemClonerInterface $orderItemCloner,
        OrderFactoryInterface $factory,
        OrderItemFactoryInterface $itemFactory
    ) {
        $this->entityManager = $entityManager;
        $this->orderCloner = $orderCloner;
        $this->orderItemCloner = $orderItemCloner;
        $this->factory = $factory;
        $this->itemFactory = $itemFactory;
    }

    public function process(OrderInterface $order): array
    {
        $this->secondaryOrders[] = $order;

        /** @var array<OrderItemInterface> $orderItems */
        $orderItems = $order->getItems();
        foreach ($orderItems as $item) {
            $itemVendor = $item->getProductOwner();
            if ($this->vendorSecondaryOrderExits($this->secondaryOrders, $itemVendor)) {
                $this->addItemIntoSecondaryOrder($this->secondaryOrders, $itemVendor, $item);
            } else {
                $this->secondaryOrders[] = $this->generateNewSecondaryOrder($order, $itemVendor, $item);
            }
        }

        foreach ($this->secondaryOrders as $secondaryOrder) {
            $this->recalculatePayment($secondaryOrder);
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
        $newItem = $this->itemFactory->createNew();
        $this->orderItemCloner->clone($item, $newItem, $shipment);
        $order->addItem($newItem);
    }

    private function generateNewSecondaryOrder(
        OrderInterface $order,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): OrderInterface {
        $newOrder = $this->factory->createNew();
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

    public function getSecondaryOrdersCount(): int
    {
        return count($this->secondaryOrders);
    }

    private function recalculatePayment(OrderInterface $secondaryOrder): void
    {
        $secondaryOrder->recalculateItemsTotal();
        $secondaryOrder->recalculateAdjustmentsTotal();
        $payment = $secondaryOrder->getPayments()[0];
        if ($payment) {
            $payment->setAmount($secondaryOrder->getTotal());
            $this->entityManager->persist($payment);
        }
    }


}
