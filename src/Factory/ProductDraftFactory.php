<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraft;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductDraftFactory implements FactoryInterface
{
    /** @return ProductDraftInterface */
    public function createNew()
    {
        return new ProductDraft();
    }
}
