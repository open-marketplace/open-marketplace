<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\ProductListingTerms;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

final class Options
{
    public const STATUS_UNDER_VERIFICATION = 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.under_verification';

    public const STATUS_VERIFIED = 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.verified';

    public const STATUS_REJECTED = 'bitbag_sylius_multi_vendor_marketplace_plugin.ui.rejected';

    public static function getTypeFilter(): array
    {
        return [
            self::STATUS_UNDER_VERIFICATION => ProductDraftInterface::STATUS_UNDER_VERIFICATION,
            self::STATUS_VERIFIED => ProductDraftInterface::STATUS_VERIFIED,
            self::STATUS_REJECTED => ProductDraftInterface::STATUS_REJECTED,
        ];
    }
}
