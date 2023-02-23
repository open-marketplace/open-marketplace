<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface ShopVendorApiSectionFactoryInterface extends FactoryInterface
{
    public function createNew(): ShopVendorApiSection;
}
