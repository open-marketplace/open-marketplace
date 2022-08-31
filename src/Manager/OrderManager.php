<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Manager;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\OrderItemClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderItemInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\OrderItemFactoryInterface;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\ShipmentInterface;

final class OrderManager implements OrderManagerInterface
{
    private OrderFactoryInterface $factory;

    private OrderClonerInterface $cloner;

    private EntityManager $entityManager;

    private OrderItemClonerInterface $orderItemCloner;

    private OrderItemFactoryInterface $itemFactory;

    public function __construct(
        OrderFactoryInterface $factory,
        OrderClonerInterface $cloner,
        EntityManager $entityManager,
        OrderItemClonerInterface $orderItemCloner,
        OrderItemFactoryInterface $itemFactory
    ) {
        $this->factory = $factory;
        $this->cloner = $cloner;
        $this->entityManager = $entityManager;
        $this->orderItemCloner = $orderItemCloner;
        $this->itemFactory = $itemFactory;
    }

    public function generateNewSecondaryOrder(
        OrderInterface $order,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): OrderInterface {
        /** @var OrderInterface $newOrder */
        $newOrder = $this->factory->createNew();
        $this->cloner->clone($order, $newOrder);
        $newOrder->setVendor($itemVendor);
        $newOrder->setPrimaryOrder($order);
        $this->entityManager->persist($newOrder);
        if ($newOrder->getShipments()[0]) {
            $this->cloneItemIntoSecondaryOrder($item, $newOrder, $newOrder->getShipments()[0]);
        }

        return $newOrder;
    }

    public function addItemIntoSecondaryOrder(
        array $secondaryOrders,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): void {
        /** @var OrderInterface $secondaryOrder */
        $secondaryOrder = $this->getVendorSecondaryOrder($secondaryOrders, $itemVendor);
        /** @var ShipmentInterface $shipments */
        $shipments = $secondaryOrder->getShipments()[0];
        $this->cloneItemIntoSecondaryOrder($item, $secondaryOrder, $shipments);
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
}
