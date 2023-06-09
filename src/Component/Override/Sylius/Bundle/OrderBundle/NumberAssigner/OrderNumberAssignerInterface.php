<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Override\Sylius\Bundle\OrderBundle\NumberAssigner;

use BitBag\OpenMarketplace\Entity\OrderInterface;

interface OrderNumberAssignerInterface
{
    public const PRIMARY_ORDER_NUMBER_PREFIX = 'primary-';

    public function assignNumber(OrderInterface $order): void;
}
