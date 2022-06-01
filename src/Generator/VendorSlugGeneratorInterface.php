<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Generator;

interface VendorSlugGeneratorInterface
{
    public function generateSlug(string $companyName): string;
}
