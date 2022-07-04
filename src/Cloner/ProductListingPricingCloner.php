<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingPricingCloner implements ProductListingPricingClonerInterface
{
    private FactoryInterface $priceFactory;

    public function __construct(FactoryInterface $priceFactory)
    {
        $this->priceFactory = $priceFactory;
    }

    public function clonePrice(ProductDraftInterface $newProductDraft, ProductDraftInterface $productDraft): void
    {
        /** @var ProductListingPriceInterface $price */
        foreach ($productDraft->getProductListingPrice() as $price) {
            /** @var ProductListingPriceInterface $newPrice */
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
