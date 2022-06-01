<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Generator;

final class VendorSlugGenerator implements VendorSlugGeneratorInterface
{
    public function generateSlug(string $companyName): string
    {
        return preg_replace('/\s+/', '-', $companyName);
    }
}
