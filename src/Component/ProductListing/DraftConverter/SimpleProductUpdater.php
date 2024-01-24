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
use BitBag\OpenMarketplace\Component\Product\Factory\ProductTranslationFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingPriceInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Exception\LocaleNotFoundException;
use BitBag\OpenMarketplace\Component\ProductListing\Exception\ProductNotFoundException;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelPricing;
use Sylius\Component\Core\Model\ProductTranslationInterface as BaseProductTranslationInterface;
use Sylius\Component\Core\Model\ProductVariant;
use Sylius\Component\Core\Repository\ProductVariantRepositoryInterface;

final class SimpleProductUpdater implements SimpleProductUpdaterInterface
{
    public function __construct(
        private ProductTranslationFactoryInterface $productTranslationFactory,
        private EntityRepository $productTranslationRepository,
        private EntityRepository $channelPricingRepository,
        private ProductVariantRepositoryInterface $productVariantRepository
    ) {
    }

    public function update(DraftInterface $productDraft): ProductInterface
    {
        $product = $productDraft->getProductListing()->getProduct();

        if (!$product) {
            throw new ProductNotFoundException('Product not found.');
        }

        return $this->updateProduct($product, $productDraft);
    }

    private function updateProduct(ProductInterface $product, DraftInterface $productDraft): ProductInterface
    {
        $product->setUpdatedAt(new \DateTime());
        $product->setChannels($productDraft->getChannels());

        $productTranslations = $this->productTranslationRepository->findBy(['translatable' => $product]);
        $mappedProductTranslations = [];

        /** @var BaseProductTranslationInterface $productTranslation */
        foreach ($productTranslations as $productTranslation) {
            $mappedProductTranslations[$productTranslation->getLocale()] = $productTranslation;
        }

        /** @var DraftTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
            $productTranslation = null;
            $translationLocale = $translation->getLocale();
            if (null === $translationLocale) {
                throw new LocaleNotFoundException('Locale not found.');
            }
            if (array_key_exists($translationLocale, $mappedProductTranslations)) {
                $productTranslation = $mappedProductTranslations[$translation->getLocale()];
                unset($mappedProductTranslations[$translation->getLocale()]);
            }

            if (null !== $productTranslation) {
                $productTranslation->setName($translation->getName());
                $productTranslation->setDescription($translation->getDescription());
                $productTranslation->setSlug($translation->getSlug());
                $productTranslation->setShortDescription($translation->getShortDescription());
                $productTranslation->setMetaDescription($translation->getMetaDescription());
                $productTranslation->setMetaKeywords($translation->getMetaKeywords());
            } else {
                $this->productTranslationFactory->createFromProductListingTranslation($product, $translation);
            }
        }

        foreach ($mappedProductTranslations as $deletedProductTranslation) {
            $product->removeTranslation($deletedProductTranslation);
        }

        /** @var ProductVariant $productVariant */
        $productVariant = $this->productVariantRepository->findOneBy(['product' => $product]);
        $productVariant->setShippingRequired($productDraft->isShippingRequired());
        $productVariant->setShippingCategory($productDraft->getShippingCategory());
        $productVariant->setTaxCategory($productDraft->getTaxCategory());

        /** @var ListingPriceInterface $productListingPrice */
        foreach ($productDraft->getProductListingPrices() as $productListingPrice) {
            /** @var ChannelPricing $channelPricing */
            $channelPricing = $this->channelPricingRepository->findOneBy(['productVariant' => $productVariant, 'channelCode' => $productListingPrice->getChannelCode()]);

            if (null !== $channelPricing) {
                $channelPricing->setPrice($productListingPrice->getPrice());
                $channelPricing->setOriginalPrice($productListingPrice->getOriginalPrice());
                $channelPricing->setMinimumPrice($productListingPrice->getMinimumPrice());
            }
        }

        return $product;
    }
}
