<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface ProductListingInterface
{
    public function getName(): ?string;
    public function setName(string $name): void;
}
