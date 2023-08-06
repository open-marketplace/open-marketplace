<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order;

use BitBag\OpenMarketplace\Component\Order\Cloner\OrderClonerInterface;
use BitBag\OpenMarketplace\Component\Order\Cloner\OrderItemClonerInterface;
use BitBag\OpenMarketplace\Component\Order\Cloner\ShipmentClonerInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Component\Order\Factory\OrderFactoryInterface;
use BitBag\OpenMarketplace\Component\Order\Factory\OrderItemFactoryInterface;
use BitBag\OpenMarketplace\Component\Order\Factory\ShipmentFactoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\ShipmentInterface;

final class OrderManager implements OrderManagerInterface
{
    public function __construct(
        private OrderFactoryInterface $factory,
        private OrderClonerInterface $cloner,
        private ShipmentClonerInterface $shipmentCloner,
        private EntityManager $entityManager,
        private OrderItemClonerInterface $orderItemCloner,
        private OrderItemFactoryInterface $itemFactory,
        private ShipmentFactoryInterface $shipmentFactory
    ) {
    }

    public function generateNewSecondaryOrder(
        OrderInterface $order,
        ?VendorInterface $itemVendor,
        OrderItemInterface $item
    ): OrderInterface {
        /** @var OrderInterface $newOrder */
        $newOrder = $this->factory->createNew();
        $this->cloner->clone($order, $newOrder);

        $newOrder->setVendor($itemVendor);
        $newOrder->setPrimaryOrder($order);
        $newOrder->setMode(OrderInterface::SECONDARY_ORDER_MODE);

        $this->entityManager->persist($newOrder);
        $this->entityManager->flush();

        $shipment = $order->getShipmentByVendor($itemVendor);
        $newShipment = null;

        if (null !== $shipment) {
            $newShipment = $this->shipmentFactory->createNew();
            $newShipment->setOrder($newOrder);
            $this->shipmentCloner->clone($shipment, $newShipment);
            $newOrder->addShipment($newShipment);
            $this->entityManager->persist($newShipment);
        }

        $this->cloneItemIntoSecondaryOrder($item, $newOrder, $newShipment);

        return $newOrder;
    }

    public function addItemIntoSecondaryOrder(
        array $secondaryOrders,
        ?VendorInterface $itemVendor,
        OrderItemInterface $item
    ): void {
        /** @var OrderInterface $secondaryOrder */
        $secondaryOrder = $this->getVendorSecondaryOrder($secondaryOrders, $itemVendor);
        /** @var ShipmentInterface $shipment */
        $shipment = $secondaryOrder->getShipments()[0];
        $this->cloneItemIntoSecondaryOrder($item, $secondaryOrder, $shipment);
    }

    private function getVendorSecondaryOrder(
        array $secondaryOrders,
        ?VendorInterface $vendor
    ): ?OrderInterface {
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
