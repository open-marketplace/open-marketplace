<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Updater;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Sylius\Component\Core\Model\ProductInterface;

interface ProductFromDraftUpdaterInterface
{
    public function updateProduct(DraftInterface $productDraft): ProductInterface;
}
