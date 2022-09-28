<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ImageInterface;

interface ProductDraftImageFactoryInterface
{
    public function createNew(): ImageInterface;
}
