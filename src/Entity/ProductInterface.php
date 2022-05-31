<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface ProductInterface
{
    public function getVendor(): ?VendorInterface;
    public function setVendor(?VendorInterface $vendor): void;
}
