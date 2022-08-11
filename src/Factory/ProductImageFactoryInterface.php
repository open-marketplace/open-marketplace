<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ProductImageInterface;

interface ProductImageFactoryInterface
{
    public function createNew(): ProductImageInterface;
}
