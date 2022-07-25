<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface OrderItemInterface
{
    public function getProductOwner(): VendorInterface;
}
