<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Cloner\ProductListingPricingClonerInterface;
use BitBag\OpenMarketplace\Cloner\ProductListingTranslationClonerInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductTranslationInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class ProductListingFromDraftFactory implements ProductListingFromDraftFactoryInterface
{
    private FactoryInterface $productListingFactoryInterface;

    private FactoryInterface $draftFactory;

    private ProductListingTranslationClonerInterface $productListingTranslationCloner;

    private ProductListingPricingClonerInterface $productListingPricingCloner;

    public function __construct(
        FactoryInterface $productListingFactoryInterface,
        FactoryInterface $draftFactory,
        ProductListingTranslationClonerInterface $productListingTranslationCloner,
        ProductListingPricingClonerInterface $productListingPricingCloner
    ) {
        $this->productListingFactoryInterface = $productListingFactoryInterface;
        $this->draftFactory = $draftFactory;
        $this->productListingTranslationCloner = $productListingTranslationCloner;
        $this->productListingPricingCloner = $productListingPricingCloner;
    }

    public function createNew(ProductDraftInterface $productDraft, VendorInterface $vendor): ProductDraftInterface
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingFactoryInterface->createNew();

        $productDraft = $this->formatTranslation($productDraft);

        $productListing->setCode($productDraft->getCode());
        $productListing->addProductDraft($productDraft);
        $productListing->setVendor($vendor);

        $productDraft->setProductListing($productListing);

        return $productDraft;
    }

    public function createClone(ProductDraftInterface $productDraft): ProductDraftInterface
    {
        $productListing = $productDraft->getProductListing();

        /** @var ProductDraftInterface $newProductDraft */
        $newProductDraft = $this->draftFactory->createNew();
        $productListing->addProductDraft($newProductDraft);

        $newProductDraft->setVersionNumber($productDraft->getVersionNumber());
        $newProductDraft->incrementVersion();
        $newProductDraft->setCode($productDraft->getCode());
        $newProductDraft->setProductListing($productListing);

        $newProductDraft->setShippingRequired($productDraft->isShippingRequired());
        $newProductDraft->setShippingCategory($productDraft->getShippingCategory());

        foreach ($productDraft->getImages() as $image) {
            $newProductDraft->addImage($image);
        }

        $newProductDraft->setAttributesFrom($productDraft);

        $newProductDraft->setProductTaxonsFrom($productDraft);

        $this->productListingTranslationCloner->cloneTranslation($newProductDraft, $productDraft);

        $this->productListingPricingCloner->clonePrice($newProductDraft, $productDraft);

        return $newProductDraft;
    }

    public function saveEdit(ProductDraftInterface $productDraft): ProductDraftInterface
    {
        $this->formatTranslation($productDraft);

        return $productDraft;
    }

    private function formatTranslation(ProductDraftInterface $productDraft): ProductDraftInterface
    {
        /** @var ProductTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
            $translation->setProductDraft($productDraft);
        }

        return $productDraft;
    }
}
