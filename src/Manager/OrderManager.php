<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Manager;

use BitBag\OpenMarketplace\Cloner\OrderClonerInterface;
use BitBag\OpenMarketplace\Cloner\OrderItemClonerInterface;
use BitBag\OpenMarketplace\Cloner\ShipmentClonerInterface;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\OrderFactoryInterface;
use BitBag\OpenMarketplace\Factory\OrderItemFactoryInterface;
use BitBag\OpenMarketplace\Factory\ShipmentFactoryInterface;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\ShipmentInterface;

final class OrderManager implements OrderManagerInterface
{
    private OrderFactoryInterface $factory;

    private OrderClonerInterface $cloner;

    private ShipmentClonerInterface $shipmentCloner;

    private EntityManager $entityManager;

    private OrderItemClonerInterface $orderItemCloner;

    private OrderItemFactoryInterface $itemFactory;

    private ShipmentFactoryInterface $shipmentFactory;

    public function __construct(
        OrderFactoryInterface $factory,
        OrderClonerInterface $cloner,
        ShipmentClonerInterface $shipmentCloner,
        EntityManager $entityManager,
        OrderItemClonerInterface $orderItemCloner,
        OrderItemFactoryInterface $itemFactory,
        ShipmentFactoryInterface $shipmentFactory
    ) {
        $this->factory = $factory;
        $this->cloner = $cloner;
        $this->shipmentCloner = $shipmentCloner;
        $this->entityManager = $entityManager;
        $this->orderItemCloner = $orderItemCloner;
        $this->itemFactory = $itemFactory;
        $this->shipmentFactory = $shipmentFactory;
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
        $this->entityManager->flush();

        $shipment = $order->getShipmentByVendor($itemVendor);
        if (null === $shipment) {
            return $newOrder;
        }

        $newShipment = $this->shipmentFactory->createNew();
        $newShipment->setOrder($newOrder);
        $this->shipmentCloner->clone($shipment, $newShipment);
        $newOrder->addShipment($newShipment);
        $this->entityManager->persist($newShipment);

        $this->cloneItemIntoSecondaryOrder($item, $newOrder, $newShipment);

        return $newOrder;
    }

    public function addItemIntoSecondaryOrder(
        array $secondaryOrders,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): void {
        /** @var OrderInterface $secondaryOrder */
        $secondaryOrder = $this->getVendorSecondaryOrder($secondaryOrders, $itemVendor);
        /** @var ShipmentInterface $shipment */
        $shipment = $secondaryOrder->getShipments()[0];
        $this->cloneItemIntoSecondaryOrder($item, $secondaryOrder, $shipment);
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
