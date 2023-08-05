<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;

interface TaxonsOperatorInterface
{
    public function copyTaxonsToProduct(DraftInterface $productDraft, ProductInterface $product): ?ProductInterface;

    public function updateTaxonsInProduct(DraftInterface $productDraft, ProductInterface $product): void;
}
