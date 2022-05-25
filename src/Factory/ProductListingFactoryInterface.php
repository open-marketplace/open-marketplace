<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface ProductListingFactoryInterface extends FactoryInterface
{
    public function createNew(): ProductListingInterface;

    public function create(
        string $name,
        string $code,
        string $locale,
        string $slug
    ): ProductListingInterface;
}
