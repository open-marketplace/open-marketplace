<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Inventory\Operator\OrderInventoryOperatorInterface;

final class OrderInventoryOperator
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
