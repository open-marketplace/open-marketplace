<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\ProductImageInterface;

interface ProductImageFactoryInterface
{
    public function createNew(): ProductImageInterface;

}
