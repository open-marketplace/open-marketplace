<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface ShopUserInterface extends \Sylius\Component\Core\Model\ShopUserInterface
{
    public function getVendor(): ?VendorInterface;

    public function setVendor(VendorInterface $vendor): void;
}
