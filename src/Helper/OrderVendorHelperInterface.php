<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\OrderInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShipmentInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;

interface OrderVendorHelperInterface
{
    public function orderHasVendorItems(OrderInterface $order): bool;

    public function orderHasVendorShipment(OrderInterface $order, VendorInterface $vendor): bool;

    public function orderHasShipmentWithoutVendor(OrderInterface $order): bool;

    public function getVendorsFromOrder(OrderInterface $order): array;

    public function getShipmentByVendor(OrderInterface $order, ?VendorInterface $vendor): ?ShipmentInterface;

    public function getShipmentWithoutVendor(OrderInterface $order): ?ShipmentInterface;
}
