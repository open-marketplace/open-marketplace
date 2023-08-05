<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftConverter;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ChannelPricingFactoryInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductTranslationFactoryInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductVariantFactoryInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductVariantTranslationFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;

final class SimpleProductFactory implements SimpleProductFactoryInterface
{
    private ProductFactoryInterface $productFactory;

    private ProductTranslationFactoryInterface $productTranslationFactory;

    private ProductVariantFactoryInterface $productVariantFactory;

    private ProductVariantTranslationFactoryInterface $productVariantTranslationFactory;

    private ChannelPricingFactoryInterface $channelPricingFactory;

    private ChannelRepositoryInterface $channelRepository;

    public function __construct(
        ProductFactoryInterface $productFactory,
        ProductTranslationFactoryInterface $productTranslationFactory,
        ProductVariantFactoryInterface $productVariantFactory,
        ProductVariantTranslationFactoryInterface $productVariantTranslationFactory,
        ChannelPricingFactoryInterface $channelPricingFactory,
        ChannelRepositoryInterface $channelRepository
    ) {
        $this->productFactory = $productFactory;
        $this->productTranslationFactory = $productTranslationFactory;
        $this->productVariantFactory = $productVariantFactory;
        $this->productVariantTranslationFactory = $productVariantTranslationFactory;
        $this->channelPricingFactory = $channelPricingFactory;
        $this->channelRepository = $channelRepository;
    }

    public function create(DraftInterface $productDraft): ProductInterface
    {
        /** @var ProductInterface $product */
        $product = $this->productFactory->createNew();
        $product = $this->setSimpleProductProperties($product, $productDraft);

        $productDraft->getProductListing()->setProduct($product);

        return $product;
    }

    private function setSimpleProductProperties(ProductInterface $product, DraftInterface $productDraft): ProductInterface
    {
        $now = new \DateTime();

        $vendor = $productDraft->getProductListing()->getVendor();
        $vendorID = $vendor->getId();
        $product->setCode($productDraft->getCode() . '-' . $vendorID);
        $product->setEnabled(true);
        $product->setUpdatedAt($now);
        $product->setCreatedAt($now);
        $product->setVendor($productDraft->getProductListing()->getVendor());
        $product->setChannels($productDraft->getChannels());

        /** @var DraftTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
            $this->productTranslationFactory->createFromProductListingTranslation($product, $translation);
        }

        $productVariant = $this->productVariantFactory->createNewForProduct($product, true, 0);
        $productVariant->setShippingRequired($productDraft->isShippingRequired());
        $productVariant->setShippingCategory($productDraft->getShippingCategory());

        /** @var DraftTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
            $this->productVariantTranslationFactory->createFromProductListingTranslation($productVariant, $translation);
        }

        $channelPricingCodes = [];
        /** @var ListingPriceInterface $productListingPrice */
        foreach ($productDraft->getProductListingPrices() as $productListingPrice) {
            if (!in_array($productListingPrice->getChannelCode(), $channelPricingCodes)) {
                $channelPricingCodes[] = $productListingPrice->getChannelCode();
            }

            $this->channelPricingFactory->createFromProductListingPrice($productVariant, $productListingPrice);
        }

        return $product;
    }
}
