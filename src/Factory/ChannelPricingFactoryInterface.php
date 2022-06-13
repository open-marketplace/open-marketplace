<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ChannelPricing;
use Sylius\Component\Core\Model\ProductVariant;

interface ChannelPricingFactoryInterface
{
    public function createNew(): ChannelPricing;

    public function create(
        ProductVariant $productVariant,
        string $channelCode,
        int $price,
        int $originalPrice,
        int $minimumPrice
    ): ChannelPricing;
}
