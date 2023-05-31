<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingPricingCloner implements ProductListingPricingClonerInterface
{
    private FactoryInterface $priceFactory;

    public function __construct(FactoryInterface $priceFactory)
    {
        $this->priceFactory = $priceFactory;
    }

    public function clonePrice(DraftInterface $newProductDraft, DraftInterface $productDraft): void
    {
        /** @var ListingPriceInterface $price */
        foreach ($productDraft->getProductListingPrices() as $price) {
            /** @var ListingPriceInterface $newPrice */
            $newPrice = $this->priceFactory->createNew();
            $newPrice->setChannelCode($price->getChannelCode());
            $newPrice->setPrice($price->getPrice());
            $newPrice->setMinimumPrice($price->getMinimumPrice());
            $newPrice->setOriginalPrice($price->getOriginalPrice());
            $newPrice->setProductDraft($newProductDraft);
            $newProductDraft->addProductListingPriceWithKey($newPrice, $newPrice->getChannelCode());
        }
    }
}
