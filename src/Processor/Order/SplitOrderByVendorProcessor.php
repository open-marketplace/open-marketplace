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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Model\VendorOrderCollector;
use Doctrine\ORM\EntityManager;
use Sylius\Component\Core\Model\Order;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\ProductVariant;

class SplitOrderByVendorProcessor
{
    private EntityManager $entityManager;

    private OrderClonerInterface $orderCloner;

    public function __construct(EntityManager $entityManager, OrderClonerInterface $orderCloner)
    {
        $this->entityManager = $entityManager;
        $this->orderCloner = $orderCloner;
    }

    /** @returns Array<VendorOrderCollector> */
    public function process(OrderInterface $order): array
    {
        /** @var array<OrderItemInterface> $orderItems */
        $orderItems = $order->getItems();
        $vendor = $this->getVendorFromOrderItem($orderItems[0]);
        $vendorOrders[] = new VendorOrderCollector($vendor, $order);

        foreach ($orderItems as $orderItem) {
            $productVendor = $this->getVendorFromOrderItem($orderItem);
            if ($productVendor === $vendorOrders[0]->getVendor()) {
                continue;
            }

            foreach ($vendorOrders as $vendorOrder) {
                $loopVendor = $vendorOrder->getVendor();
                if ($productVendor === $loopVendor) {
                    $vendorOrder->getOrder()->addItem($orderItem);
                    $order->removeItem($orderItem);
                    $this->entityManager->persist($order);
                    $this->entityManager->persist($vendorOrder->getOrder());
                }
            }
            $newOrder = new Order();
            $this->orderCloner->clone($order, $newOrder);

            $vendorOrder = new VendorOrderCollector($vendor, $newOrder);
            $vendorOrder->getOrder()->addItem($orderItem);
            $order->removeItem($orderItem);
            $this->entityManager->persist($order);
            $this->entityManager->persist($vendorOrder->getOrder());
            $vendorOrders[] = $vendorOrder;
        }
        $orders = [];
        foreach ($vendorOrders as $vendorOrder) {
            $orders[] = $vendorOrder->getOrder();
        }
        $this->entityManager->flush();

        return $orders;
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
