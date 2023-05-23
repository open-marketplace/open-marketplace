<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;

interface ProductListingFromDraftFactoryInterface
{
    public function createNewProductListing(ProductDraftInterface $productDraft, VendorInterface $vendor): void;

    public function getLatestDraft(ProductListingInterface $productListing): ProductDraftInterface;

    public function rejoinRelations(ProductDraftInterface $productDraft): void;
}
