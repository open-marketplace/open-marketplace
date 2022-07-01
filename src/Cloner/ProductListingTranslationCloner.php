<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\LocaleNotFoundException;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingTranslationCloner implements ProductListingTranslationClonerInterface
{
    private FactoryInterface $translationFactory;

    public function __construct(FactoryInterface $translationFactory)
    {
        $this->translationFactory = $translationFactory;
    }

    public function cloneTranslation(ProductDraftInterface $newProductDraft, ProductDraftInterface $productDraft): void
    {
        /** @var ProductTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
            $locale = $translation->getLocale();
            if (null === $locale) {
                throw new LocaleNotFoundException('Locale not found.');
            }

            /** @var ProductTranslationInterface $newTranslation */
            $newTranslation = $this->translationFactory->createNew();
            $newTranslation->setName($translation->getName());
            $newTranslation->setProductDraft($newProductDraft);
            $newTranslation->setDescription($translation->getDescription());
            $newTranslation->setLocale($locale);
            $newTranslation->setMetaDescription($translation->getMetaDescription());
            $newTranslation->setMetaKeywords($translation->getMetaKeywords());
            $newTranslation->setSlug($translation->getSlug());
            $newTranslation->setShortDescription($translation->getShortDescription());
            $newProductDraft->addTranslationsWithKey($newTranslation, $locale);
        }
    }
}
