<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Override\Sylius\Bundle\CoreBundle\Doctrine\ORM\Inventory\Operator;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use Sylius\Component\Core\Inventory\Operator\OrderInventoryOperatorInterface;
use Sylius\Component\Core\Model\OrderInterface as BaseOrderInterface;

final class OrderInventoryOperator implements OrderInventoryOperatorInterface
{
    private OrderInventoryOperatorInterface $decoratedOperator;

    public function __construct(
        OrderInventoryOperatorInterface $decoratedOperator,
    ) {
        $this->decoratedOperator = $decoratedOperator;
    }

    public function cancel(BaseOrderInterface $order): void
    {
        if (!$order instanceof OrderInterface) {
            return;
        }
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->cancel($order);
        }
    }

    public function hold(BaseOrderInterface $order): void
    {
        if (!$order instanceof OrderInterface) {
            return;
        }
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->hold($order);
        }
    }

    public function sell(BaseOrderInterface $order): void
    {
        if (!$order instanceof OrderInterface) {
            return;
        }
        if (null !== $order->getPrimaryOrder()) {
            $this->decoratedOperator->sell($order);
        }
    }
}
