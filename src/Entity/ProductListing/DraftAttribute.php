<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Sylius\Component\Attribute\Model\Attribute;
use Sylius\Component\Product\Model\ProductAttributeInterface;

class DraftAttribute extends Attribute implements DraftAttributeInterface
{
    protected VendorInterface $vendor;

    protected ?ProductAttributeInterface $productAttribute;

    public function getProductAttribute(): ?ProductAttributeInterface
    {
        return $this->productAttribute;
    }

    public function setProductAttribute(?ProductAttributeInterface $productAttribute): void
    {
        $this->productAttribute = $productAttribute;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }
}
