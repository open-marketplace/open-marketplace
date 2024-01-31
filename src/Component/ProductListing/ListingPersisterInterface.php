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
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

interface ListingPersisterInterface
{
    public function createNewProductListing(
        DraftInterface $productDraft,
        VendorInterface $vendor
    ): void;

    public function resolveLatestDraft(
        ListingInterface $listing
    ): DraftInterface;

    public function updateLatestDraftWith(
        ListingInterface $listing,
        DraftInterface $base
    ): void;

    public function uploadImages(
        DraftInterface $productDraft
    ): void;

    public function deleteImages(
        DraftInterface $productDraft
    ): void;
}
