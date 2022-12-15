<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

final class UpdateProductListing implements UpdateProductListingInterface
{
    private ?ProductDraft $productDraft = null;

    private VendorInterface $vendor;

    private ?ProductListingInterface $productListing = null;

    public function getProductDraft(): ?ProductDraft
    {
        return $this->productDraft;
    }

    public function setProductDraft(ProductDraft $productDraft): void
    {
        $this->productDraft = $productDraft;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getProductListing(): ?ProductListingInterface
    {
        return $this->productListing;
    }

    public function setProductListing(ProductListingInterface $productListing): void
    {
        $this->productListing = $productListing;
    }
}
