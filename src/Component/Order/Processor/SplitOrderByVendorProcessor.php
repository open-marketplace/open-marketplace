<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Processor;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Component\Order\Event\PostSplitOrderEvent;
use BitBag\OpenMarketplace\Component\Order\Event\PreSplitOrderEvent;
use BitBag\OpenMarketplace\Component\Order\OrderManagerInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

final class SplitOrderByVendorProcessor implements SplitOrderByVendorProcessorInterface
{
    public function __construct(
        private OrderManagerInterface $orderManager,
        private EntityManagerInterface $entityManager,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function process(OrderInterface $order): array
    {
        $orders = [$order];

        if ($order->isPrimary()) {
            foreach ($order->getSecondaryOrders() as $secondaryOrder) {
                $this->entityManager->remove($secondaryOrder);
            }
            $order->getSecondaryOrders()->clear();

            $this->eventDispatcher->dispatch(new PreSplitOrderEvent($order), PreSplitOrderEvent::NAME);

            $secondaryOrders = [];

            /** @var array<OrderItemInterface> $orderItems */
            $orderItems = $order->getItems();
            /** @var OrderItemInterface $item */
            foreach ($orderItems as $item) {
                $itemVendor = $item->getProductOwner();
                if ($this->vendorSecondaryOrderExits($secondaryOrders, $itemVendor)) {
                    $this->orderManager->addItemIntoSecondaryOrder($secondaryOrders, $itemVendor, $item);
                } else {
                    $secondaryOrder = $this->orderManager->generateNewSecondaryOrder($order, $itemVendor, $item);
                    $secondaryOrders[] = $secondaryOrder;
                    $order->addSecondaryOrder($secondaryOrder);
                }
            }

            $this->eventDispatcher->dispatch(new PostSplitOrderEvent($secondaryOrders), PostSplitOrderEvent::NAME);

            $orders = [$order, ...$secondaryOrders];
        }

        return $orders;
    }

    private function vendorSecondaryOrderExits(array $secondaryOrders, ?VendorInterface $vendor): bool
    {
        foreach ($secondaryOrders as $secondaryOrder) {
            if ($secondaryOrder->getVendor() === $vendor) {
                return true;
            }
        }

        return false;
    }
}
