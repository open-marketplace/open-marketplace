<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Entity;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use Ramsey\Uuid\UuidInterface;
use Sylius\Component\Attribute\Model\Attribute;
use Sylius\Component\Product\Model\ProductAttributeInterface;

class DraftAttribute extends Attribute implements DraftAttributeInterface
{
    protected ?UuidInterface $uuid = null;

    protected VendorInterface $vendor;

    protected ?ProductAttributeInterface $productAttribute = null;

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

    public function getUuid(): ?UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(?UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
    }
}
