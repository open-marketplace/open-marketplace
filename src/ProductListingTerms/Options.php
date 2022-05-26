<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\ProductListingTerms;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;

final class Options
{
    const STATUS_UNDER_VERIFICATION = 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.under_verification';
    const STATUS_VERIFIED = 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.verified';
    const STATUS_REJECTED = 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.rejected';

    public static function getTypeFilter(): array
    {
        return [
            self::STATUS_UNDER_VERIFICATION => ProductListingInterface::STATUS_UNDER_VERIFICATION,
            self::STATUS_VERIFIED => ProductListingInterface::STATUS_VERIFIED,
            self::STATUS_REJECTED => ProductListingInterface::STATUS_REJECTED,
        ];
    }
}
