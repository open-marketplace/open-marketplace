<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ChannelPricing;
use Sylius\Component\Core\Model\ProductVariant;

final class ChannelPricingFactory implements ChannelPricingFactoryInterface
{

    public function createNew(): ChannelPricing
    {
        return new ChannelPricing();
    }

    public function create(
        ProductVariant $productVariant,
        string $channelCode,
        int $price,
        int $originalPrice,
        int $minimumPrice
    ): ChannelPricing {
        $channelPricing =  new ChannelPricing();

        $channelPricing->setProductVariant($productVariant);
        $channelPricing->setChannelCode($channelCode);
        $channelPricing->setPrice($price);
        $channelPricing->setOriginalPrice($originalPrice);
        $channelPricing->setMinimumPrice($minimumPrice);

        return $channelPricing;
    }
}
