<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Core\Model\OrderItemInterface as BaseOrderItemInterface;

interface OrderItemInterface extends BaseOrderItemInterface
{
    public function getProductOwner(): VendorInterface;
}
