<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Doctrine\Common\Collections\Collection;

interface OrderInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

    public function getPrimaryOrder(): ?self;

    public function setPrimaryOrder(?self $primaryOrder): void;

    public function addSecondaryOrder(self $subOrder): void;

    /** @return Collection<int, OrderInterface> */
    public function getSecondaryOrders(): Collection;
}
