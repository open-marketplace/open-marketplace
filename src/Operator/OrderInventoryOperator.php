<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Inventory\Operator\OrderInventoryOperatorInterface;

class OrderInventoryOperator
{
    private OrderInventoryOperatorInterface $decoratedOperator;

    private EntityManagerInterface $productVariantManager;

    public function __construct(
        OrderInventoryOperatorInterface $decoratedOperator,
        EntityManagerInterface $productVariantManager,
    ) {
        $this->decoratedOperator = $decoratedOperator;
        $this->productVariantManager = $productVariantManager;
    }

    public function cancel(OrderInterface $order): void
    {
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->cancel($order);
        }
    }

    public function hold(OrderInterface $order): void
    {
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->hold($order);
        }
    }

    public function sell(OrderInterface $order): void
    {
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->sell($order);
        }
    }
}
