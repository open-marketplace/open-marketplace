<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Provider;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Sylius\Component\Core\Model\OrderItemInterface;

interface VendorProviderInterface
{
    public function provideCurrentVendor(): VendorInterface;

    public function provideVendorFromOrderItem(OrderItemInterface $orderItem): VendorInterface;
}
