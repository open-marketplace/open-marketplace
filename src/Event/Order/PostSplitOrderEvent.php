<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);


namespace BitBag\OpenMarketplace\Event\Order;

use BitBag\OpenMarketplace\Entity\OrderInterface;

class PostSplitOrderEvent
{

    public const NAME = 'order.post_split';

    /**
     * @var OrderInterface[]
     */
    private array $orders;

    /**
     * @param OrderInterface[] $orders
     */
    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }


}
