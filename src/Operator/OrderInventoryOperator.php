<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Inventory\Operator\OrderInventoryOperatorInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class OrderInventoryOperator implements OrderInventoryOperatorInterface
{
    private OrderInventoryOperatorInterface $decoratedOperator;

    public function __construct(
        OrderInventoryOperatorInterface $decoratedOperator,
    ) {
        $this->decoratedOperator = $decoratedOperator;
    }

    public function cancel(OrderInterface $order): void
    {
        if (!$order instanceof \BitBag\OpenMarketplace\Entity\OrderInterface) {
            return;
        }
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->cancel($order);
        }
    }

    public function hold(OrderInterface $order): void
    {
        if (!$order instanceof \BitBag\OpenMarketplace\Entity\OrderInterface) {
            return;
        }
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->hold($order);
        }
    }

    public function sell(OrderInterface $order): void
    {
        if (!$order instanceof \BitBag\OpenMarketplace\Entity\OrderInterface) {
            return;
        }
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->sell($order);
        }
    }
}
