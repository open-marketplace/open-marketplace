<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Core\Model\OrderInterface as BaseInterface;

interface OrderInterface extends BaseInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(?VendorInterface $vendor): void;

    public function getPrimaryOrder(): ?self;

    public function setPrimaryOrder(?self $primaryOrder): void;
}
