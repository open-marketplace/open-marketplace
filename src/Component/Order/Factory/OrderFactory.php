<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Factory;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;

final class OrderFactory implements OrderFactoryInterface
{
    private string $orderFQN;

    public function __construct(string $orderFQN)
    {
        $this->orderFQN = $orderFQN;
    }

    public function createNew(): OrderInterface
    {
        /** @phpstan-ignore-next-line */
        return new $this->orderFQN();
    }
}
