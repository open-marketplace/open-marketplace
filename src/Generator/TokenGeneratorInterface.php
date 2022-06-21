<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Generator;

interface TokenGeneratorInterface
{
    public function generate(): string;
}
