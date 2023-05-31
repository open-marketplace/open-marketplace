<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Factory\DraftPricingFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;

final class DraftPricingCloner implements DraftPricingClonerInterface
{
    public function __construct(
        private DraftPricingFactoryInterface $priceFactory
    ) {

    }

    public function clone(DraftInterface $to, DraftInterface $from): void
    {
        /** @var ListingPriceInterface $price */
        foreach ($from->getProductListingPrices() as $price) {
            /** @var ListingPriceInterface $newPrice */
            $newPrice = $this->priceFactory->createForChannelCode(
                $price->getChannelCode(),
                $price->getProductDraft()
            );

            $newPrice->setPrice($price->getPrice());
            $newPrice->setMinimumPrice($price->getMinimumPrice());
            $newPrice->setOriginalPrice($price->getOriginalPrice());
            $to->addProductListingPriceWithKey($newPrice, $newPrice->getChannelCode());
        }
    }
}
