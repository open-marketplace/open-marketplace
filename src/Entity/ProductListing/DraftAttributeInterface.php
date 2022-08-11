<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Sylius\Component\Attribute\Model\AttributeInterface;

interface DraftAttributeInterface extends AttributeInterface
{
    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;
}
