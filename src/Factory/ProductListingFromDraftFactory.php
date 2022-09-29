<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ProductListingPricingClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ProductListingTranslationClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
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
        $productListing->addProductDrafts($productDraft);
        $productListing->setVendor($vendor);

        $productDraft->setProductListing($productListing);

        return $productDraft;
    }

    public function createClone(ProductDraftInterface $productDraft): ProductDraftInterface
    {
        $productListing = $productDraft->getProductListing();

        /** @var ProductDraftInterface $newProductDraft */
        $newProductDraft = $this->draftFactory->createNew();

        $newProductDraft->setVersionNumber($productDraft->getVersionNumber());
        $newProductDraft->incrementVersion();
        $newProductDraft->setCode($productDraft->getCode());
        $newProductDraft->setProductListing($productListing);

        foreach ($productDraft->getImages() as $image) {
            $newProductDraft->addImage($image);
        }

        $newProductDraft->setAttributesFrom($productDraft);

        $newProductDraft->setProductTaxonsFrom($productDraft);

        $this->productListingTranslationCloner->cloneTranslation($newProductDraft, $productDraft);

        $this->productListingPricingCloner->clonePrice($newProductDraft, $productDraft);

        $newProductDraft->setProductListing($productDraft->getProductListing());

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
