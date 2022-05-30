<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Command\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;

interface CreateProductListingCommandInterface
{
    public function create(ProductDraftInterface $productDraft,bool $isSend): void;
    public function editAndCreate(ProductDraftInterface $productDraft,bool $isSend): void;
}