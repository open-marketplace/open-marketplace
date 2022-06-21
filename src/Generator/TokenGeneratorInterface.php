<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Generator;

interface TokenGeneratorInterface
{
    public function generate(): string;
}