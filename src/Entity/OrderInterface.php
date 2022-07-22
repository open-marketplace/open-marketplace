<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Doctrine\Common\Collections\Collection;

interface OrderInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

    public function getPrimaryOrder(): ?OrderInterface;

    public function setPrimaryOrder(?OrderInterface $primaryOrder): void;

    public function addSecondaryOrder(OrderInterface $subOrder): void;

    /** @return Collection<int, OrderInterface> */
    public function getSecondaryOrders(): Collection;
}
