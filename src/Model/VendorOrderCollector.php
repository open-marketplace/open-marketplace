<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Model;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Sylius\Component\Order\Model\OrderInterface;

class VendorOrderCollector
{
    private VendorInterface $vendor;

    private OrderInterface $order;

    public function __construct(VendorInterface $vendor, OrderInterface $order)
    {
        $this->vendor = $vendor;
        $this->order = $order;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getOrder(): OrderInterface
    {
        return $this->order;
    }

    public function setOrder(OrderInterface $order): void
    {
        $this->order = $order;
    }
}
