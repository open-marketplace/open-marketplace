<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\Draft;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

final class UpdateProductListing implements UpdateProductListingInterface
{
    private ?Draft $productDraft = null;

    private VendorInterface $vendor;

    private ?ListingInterface $productListing = null;

    public function getProductDraft(): ?Draft
    {
        return $this->productDraft;
    }

    public function setProductDraft(Draft $productDraft): void
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

    public function getProductListing(): ?ListingInterface
    {
        return $this->productListing;
    }

    public function setProductListing(ListingInterface $productListing): void
    {
        $this->productListing = $productListing;
    }
}
