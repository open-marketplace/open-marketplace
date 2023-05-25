<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

interface ProductListingAdministrationToolInterface
{
    public function createNewProductListing(
        ProductDraftInterface $productDraft,
        VendorInterface $vendor
    ): void;

    public function updateProductListing(
        ProductListingInterface $productListing,
        ProductDraftInterface $productDraft
    ): void;

    public function serveLatestDraft(
        ProductListingInterface $productListing
    ): ProductDraftInterface;

    public function updateLatestDraftWith(
        ProductListingInterface $productListing,
        ProductDraftInterface $base
    ): void;
}
