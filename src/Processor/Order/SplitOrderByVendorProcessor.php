<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Processor\Order;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Manager\OrderManagerInterface;
use BitBag\OpenMarketplace\Refresher\PaymentRefresherInterface;
use Doctrine\ORM\EntityManager;

class SplitOrderByVendorProcessor implements SplitOrderByVendorProcessorInterface
{
    private EntityManager $entityManager;

    private array $secondaryOrders;

    private OrderManagerInterface $orderManager;

    private PaymentRefresherInterface $paymentRefresher;

    public function __construct(
        EntityManager $entityManager,
        OrderManagerInterface $orderManager,
        PaymentRefresherInterface $paymentRefresher
    ) {
        $this->entityManager = $entityManager;
        $this->orderManager = $orderManager;
        $this->paymentRefresher = $paymentRefresher;
    }

    public function process(OrderInterface $order): array
    {
        $this->secondaryOrders = [];

        $this->secondaryOrders[] = $order;

        /** @var array<OrderItemInterface> $orderItems */
        $orderItems = $order->getItems();
        /** @var OrderItemInterface $item */
        foreach ($orderItems as $item) {
            $itemVendor = $item->getProductOwner();
            if ($this->vendorSecondaryOrderExits($this->secondaryOrders, $itemVendor)) {
                $this->orderManager->addItemIntoSecondaryOrder($this->secondaryOrders, $itemVendor, $item);
            } else {
                $this->secondaryOrders[] = $this->orderManager->generateNewSecondaryOrder($order, $itemVendor, $item);
            }
        }

        foreach ($this->secondaryOrders as $secondaryOrder) {
            $this->paymentRefresher->refreshPayment($secondaryOrder);
        }

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

    public function getSecondaryOrdersCount(): int
    {
        return count($this->secondaryOrders);
    }
}
