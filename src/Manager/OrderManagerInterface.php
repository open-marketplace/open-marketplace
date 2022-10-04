<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Manager;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

interface OrderManagerInterface
{
    public function generateNewSecondaryOrder(
        OrderInterface $order,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): OrderInterface;

    public function addItemIntoSecondaryOrder(
        array $secondaryOrders,
        VendorInterface $itemVendor,
        OrderItemInterface $item
    ): void;
}
