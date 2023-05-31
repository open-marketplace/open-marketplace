<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;

interface ProductDraftFilesOperatorInterface
{
    public function copyFilesToProduct(DraftInterface $productDraft, ProductInterface $cratedProduct): void;

    public function removeOldFiles(ProductInterface $product): void;
}
