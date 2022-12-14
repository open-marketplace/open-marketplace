<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Updater;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductTranslationInterface;
use BitBag\OpenMarketplace\Exception\LocaleNotFoundException;
use BitBag\OpenMarketplace\Exception\ProductNotFoundException;
use BitBag\OpenMarketplace\Factory\ProductTranslationFactoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelPricing;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\ProductTranslationInterface as BaseProductTranslationInterface;
use Sylius\Component\Core\Repository\ProductVariantRepositoryInterface;

final class ProductFromDraftUpdater implements ProductFromDraftUpdaterInterface
{
    private ProductTranslationFactoryInterface $productTranslationFactory;

    private EntityRepository $productTranslationRepository;

    private EntityRepository $channelPricingRepository;

    private ProductVariantRepositoryInterface $productVariantRepository;

    public function __construct(
        ProductTranslationFactoryInterface $productTranslationFactory,
        EntityRepository $productTranslationRepository,
        EntityRepository $channelPricingRepository,
        ProductVariantRepositoryInterface $productVariantRepository
    ) {
        $this->productTranslationFactory = $productTranslationFactory;
        $this->productTranslationRepository = $productTranslationRepository;
        $this->channelPricingRepository = $channelPricingRepository;
        $this->productVariantRepository = $productVariantRepository;
    }

    public function updateProduct(ProductDraftInterface $productDraft): ProductInterface
    {
        $product = $productDraft->getProductListing()->getProduct();

        if (!$product) {
            throw new ProductNotFoundException('Product not found.');
        }

        return $this->updateSimpleProductProperties($product, $productDraft);
    }

    private function updateSimpleProductProperties(ProductInterface $product, ProductDraftInterface $productDraft): ProductInterface
    {
        $product->setUpdatedAt(new \DateTime());

        $productTranslations = $this->productTranslationRepository->findBy(['translatable' => $product]);
        $mappedProductTranslations = [];

        /** @var BaseProductTranslationInterface $productTranslation */
        foreach ($productTranslations as $productTranslation) {
            $mappedProductTranslations[$productTranslation->getLocale()] = $productTranslation;
        }

        /** @var ProductTranslationInterface $translation */
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

        $productVariant = $this->productVariantRepository->findOneBy(['product' => $product]);

        /** @var ProductListingPriceInterface $productListingPrice */
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
