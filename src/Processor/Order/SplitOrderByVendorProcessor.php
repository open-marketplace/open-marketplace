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

    private OrderManagerInterface $orderManager;

    private PaymentRefresherInterface $paymentRefresher;

    private VendorCommissionProcessorInterface $commissionProcessor;

    public function __construct(
        EntityManager $entityManager,
        OrderManagerInterface $orderManager,
        PaymentRefresherInterface $paymentRefresher,
        VendorCommissionProcessorInterface $commissionProcessor
    ) {
        $this->entityManager = $entityManager;
        $this->orderManager = $orderManager;
        $this->paymentRefresher = $paymentRefresher;
        $this->commissionProcessor = $commissionProcessor;
    }

    public function process(OrderInterface $order): array
    {
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

        foreach ($secondaryOrders as $secondaryOrder) {
            $this->commissionProcessor->process($secondaryOrder);
        }

        $orders = [$order, ...$secondaryOrders];

        foreach ($orders as $order) {
            $this->paymentRefresher->refreshPayment($order);
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
