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
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class ProductListingFromDraftFactory implements ProductListingFromDraftFactoryInterface
{
    private FactoryInterface $productListingFactory;

    private FactoryInterface $draftFactory;

    private ProductListingTranslationClonerInterface $productListingTranslationCloner;

    private ProductListingPricingClonerInterface $productListingPricingCloner;

    private ImageUploaderInterface $imageUploader;

    public function __construct(
        FactoryInterface $productListingFactory,
        FactoryInterface $draftFactory,
        ProductListingTranslationClonerInterface $productListingTranslationCloner,
        ProductListingPricingClonerInterface $productListingPricingCloner,
        ImageUploaderInterface $imageUploader,
    ) {
        $this->productListingFactory = $productListingFactory;
        $this->draftFactory = $draftFactory;
        $this->productListingTranslationCloner = $productListingTranslationCloner;
        $this->productListingPricingCloner = $productListingPricingCloner;
        $this->imageUploader = $imageUploader;
    }

    public function createNewProductListing(
        ProductDraftInterface $productDraft,
        VendorInterface $vendor
    ): void {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingFactory->createNew();
        $productListing->setCode($productDraft->getCode());
        $productListing->insertDraft($productDraft);
        $productListing->setVendor($vendor);

        $productDraft->setProductListing($productListing);
        $this->rejoinRelations($productDraft);
    }

    public function getLatestDraft(ProductListingInterface $productListing): ProductDraftInterface
    {
        $latestDraft = $productListing->getLatestDraft();

        if ($productListing->needsNewDraft()) {
            $newProductDraft = $this->draftFactory->createNew();
            $latestDraft->cloneInto($newProductDraft);
            $latestDraft->markAsCreated();

            $this->productListingTranslationCloner->cloneTranslation($newProductDraft, $latestDraft);
            $this->productListingPricingCloner->clonePrice($newProductDraft, $latestDraft);
            $productListing->insertDraft($newProductDraft);
        }

        return $productListing->getLatestDraft();
    }

    public function rejoinRelations(ProductDraftInterface $productDraft): void
    {
        foreach ($productDraft->getTranslations() as $translation) {
            $translation->setProductDraft($productDraft);
        }

        foreach ($productDraft->getAttributes() as $attribute) {
            $attribute->setSubject($productDraft);
            $productDraft->addAttribute($attribute);
        }

        foreach ($productDraft->getImages() as $image) {
            $image->setOwner($productDraft);
            $this->imageUploader->upload($image);
        }
    }
}
