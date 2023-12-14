<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Override\Sylius\Bundle\OrderBundle\NumberAssigner;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use Sylius\Bundle\OrderBundle\NumberAssigner\OrderNumberAssignerInterface as DecoratedOrderNumberAssignerInterface;

final class OrderNumberAssigner implements OrderNumberAssignerInterface
{
    private DecoratedOrderNumberAssignerInterface $decoratedOrderNumberAssigner;

    public function __construct(DecoratedOrderNumberAssignerInterface $decoratedOrderNumberAssigner)
    {
        $this->decoratedOrderNumberAssigner = $decoratedOrderNumberAssigner;
    }

    public function assignNumber(OrderInterface $order): void
    {
        if (null !== $order->getNumber()) {
            return;
        }

        if ($order->isPrimary()) {
            return;
        }

        $this->decoratedOrderNumberAssigner->assignNumber($order);
    }
}
