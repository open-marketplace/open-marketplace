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
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeInterface;

interface DraftAttributeInterface extends AttributeInterface
{
    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function getProductAttribute(): ?ProductAttributeInterface;

    public function setProductAttribute(?ProductAttributeInterface $productAttribute): void;
}
