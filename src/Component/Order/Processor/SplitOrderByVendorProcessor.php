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
use BitBag\OpenMarketplace\Component\Order\Refresher\PaymentRefresherInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

final class SplitOrderByVendorProcessor implements SplitOrderByVendorProcessorInterface
{
    public function __construct(
        private EntityManager $entityManager,
        private OrderManagerInterface $orderManager,
        private PaymentRefresherInterface $paymentRefresher,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function process(OrderInterface $order): array
    {
        $isPrimaryOrder = $order->isPrimary() && 0 < $order->getSecondaryOrders()->count();

        if ($isPrimaryOrder) {
            $orders = [$order, ...$order->getSecondaryOrders()];
            foreach ($orders as $iOrder) {
                $this->paymentRefresher->refreshPayment($iOrder);
            }

            return $orders;
        }

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
                $secondaryOrders[] = $this->orderManager->generateNewSecondaryOrder($order, $itemVendor, $item);
            }
        }

        $this->eventDispatcher->dispatch(new PostSplitOrderEvent($secondaryOrders), PostSplitOrderEvent::NAME);

        $orders = [$order, ...$secondaryOrders];

        foreach ($orders as $iOrder) {
            $this->paymentRefresher->refreshPayment($iOrder);
        }

        $this->entityManager->flush();

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
