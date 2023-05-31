<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

interface ProductListingAdministrationToolInterface
{
    public function createNewProductListing(
        DraftInterface $productDraft,
        VendorInterface $vendor
    ): void;

    public function updateProductListing(
        ListingInterface $productListing,
        DraftInterface $productDraft
    ): void;

    public function serveLatestDraft(
        ListingInterface $productListing
    ): DraftInterface;

    public function updateLatestDraftWith(
        ListingInterface $productListing,
        DraftInterface $base
    ): void;
}
