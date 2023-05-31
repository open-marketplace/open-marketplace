<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing;

use BitBag\OpenMarketplace\Cloner\ProductListingPricingClonerInterface;
use BitBag\OpenMarketplace\Cloner\ProductListingTranslationClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftImageInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Factory\DraftAttributeValueFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Factory\DraftImageFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Factory\DraftTaxonFactoryInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class ProductListingAdministrationTool implements ProductListingAdministrationToolInterface
{
    private FactoryInterface $productListingFactory;

    private FactoryInterface $draftFactory;

    private ProductListingTranslationClonerInterface $productListingTranslationCloner;

    private ProductListingPricingClonerInterface $productListingPricingCloner;

    private ImageUploaderInterface $imageUploader;

    private DraftImageFactoryInterface $productDraftImageFactory;

    private DraftAttributeValueFactoryInterface $draftAttributeValueFactory;

    private DraftTaxonFactoryInterface $draftTaxonFactory;

    private EntityManagerInterface $entityManager;

    private string $imageUploadPath;

    public function __construct(
        FactoryInterface $productListingFactory,
        FactoryInterface $draftFactory,
        ProductListingTranslationClonerInterface $productListingTranslationCloner,
        ProductListingPricingClonerInterface $productListingPricingCloner,
        ImageUploaderInterface $imageUploader,
        DraftImageFactoryInterface $productDraftImageFactory,
        DraftAttributeValueFactoryInterface $draftAttributeValueFactory,
        DraftTaxonFactoryInterface $draftTaxonFactory,
        EntityManagerInterface $entityManager,
        string $imageUploadPath
    ) {
        $this->productListingFactory = $productListingFactory;
        $this->draftFactory = $draftFactory;
        $this->productListingTranslationCloner = $productListingTranslationCloner;
        $this->productListingPricingCloner = $productListingPricingCloner;
        $this->imageUploader = $imageUploader;
        $this->productDraftImageFactory = $productDraftImageFactory;
        $this->draftAttributeValueFactory = $draftAttributeValueFactory;
        $this->draftTaxonFactory = $draftTaxonFactory;
        $this->entityManager = $entityManager;
        $this->imageUploadPath = $imageUploadPath;
    }

    public function createNewProductListing(
        DraftInterface $productDraft,
        VendorInterface $vendor
    ): void {
        /** @var ListingInterface $productListing */
        $productListing = $this->productListingFactory->createNew();
        $productListing->setCode($productDraft->getCode());
        $productListing->insertDraft($productDraft);
        $productListing->setVendor($vendor);

        $productDraft->setProductListing($productListing);

        $this->rejoinRelations($productDraft);
        $this->uploadImages($productDraft);
    }

    public function updateProductListing(
        ListingInterface $productListing,
        DraftInterface $productDraft
    ): void {
        $this->rejoinRelations($productDraft);
        $this->uploadImages($productDraft);
    }

    private function rejoinRelations(DraftInterface $productDraft): void
    {
        foreach ($productDraft->getTranslations() as $translation) {
            $translation->setProductDraft($productDraft);
        }

        foreach ($productDraft->getAttributes() as $attribute) {
            $attribute->setSubject($productDraft);
        }

        foreach ($productDraft->getImages() as $image) {
            $image->setOwner($productDraft);
        }
    }

    public function serveLatestDraft(
        ListingInterface $productListing
    ): DraftInterface {
        $latestDraft = $productListing->getLatestDraft();

        if ($productListing->needsNewDraft()) {
            $newProductDraft = $this->createNextDraft($latestDraft);
            $productListing->insertDraft($newProductDraft);

            $this->productListingTranslationCloner->cloneTranslation($newProductDraft, $latestDraft);
            $this->productListingPricingCloner->clonePrice($newProductDraft, $latestDraft);

            // Important. The flush here prevents to re-upload trashy images on every render the listing edit form
            $this->entityManager->flush();
        }

        return $productListing->getLatestDraft();
    }

    private function createNextDraft(DraftInterface $base): DraftInterface
    {
        $destination = $this->draftFactory->createNew();
        $destination->markAsCreated();

        $destination->setProductListing($base->getProductListing());
        $destination->setCode($base->getCode());
        $destination->setShippingRequired($base->isShippingRequired());
        $destination->setShippingCategory($base->getShippingCategory());

        $destination->setVersionNumber($base->getVersionNumber());
        $destination->incrementVersion();

        $destination->setChannels($base->getChannels());
        $destination->setMainTaxon($base->getMainTaxon());

        $this->cloneTaxons($base, $destination);
        $this->cloneAttributes($base, $destination);
        $this->cloneImages($base, $destination);

        return $destination;
    }

    public function updateLatestDraftWith(
        ListingInterface $productListing,
        DraftInterface $base
    ): void {
        $destination = $this->serveLatestDraft($productListing);

        $destination->setShippingRequired($base->isShippingRequired());
        $destination->setShippingCategory($base->getShippingCategory());

        $destination->setVersionNumber($base->getVersionNumber());
        $destination->incrementVersion();

        $destination->setChannels($base->getChannels());
        $destination->setMainTaxon($base->getMainTaxon());

        $destination->clearProductDraftTaxons();
        $this->cloneTaxons($base, $destination);

        $destination->clearAttributes();;
        $this->cloneAttributes($base, $destination);

        $destination->clearImages();
        $this->cloneImages($base, $destination);

        $this->productListingTranslationCloner->cloneTranslation($destination, $base);
        $this->productListingPricingCloner->clonePrice($destination, $base);
    }

    private function cloneAttributes(
        DraftInterface $from,
        DraftInterface $to
    ): void {
        foreach ($from->getAttributes() as $baseAttribute) {
            $attributeValue = $this->draftAttributeValueFactory->createForAttribute($baseAttribute->getAttribute(), $to);
            $attributeValue->setValue($baseAttribute->getValue());
            $to->addAttribute($attributeValue);

            $this->entityManager->persist($attributeValue);
        }
    }

    private function cloneTaxons(
        DraftInterface $from,
        DraftInterface $to
    ): void {
        foreach ($from->getProductDraftTaxons() as $baseDraftTaxon) {
            $draftTaxon = $this->draftTaxonFactory->createForTaxon(
                $baseDraftTaxon->getTaxon(),
                $to
            );
            $draftTaxon->setPosition($baseDraftTaxon->getPosition());
            $to->addProductDraftTaxon($draftTaxon);

            $this->entityManager->persist($draftTaxon);
        }
    }

    private function cloneImages(
        DraftInterface $from,
        DraftInterface $to
    ): void {
        $baseImages = $from->getImages();

        /** @var DraftImageInterface $baseImage */
        foreach ($baseImages as $baseImage) {
            $newImage = $this->productDraftImageFactory->createForDraft($to);
            $newImage->setType($baseImage->getType());
            $newImage->setFile($baseImage->getFile());

            $baseImagePath = sprintf('%s/%s', $this->imageUploadPath, $baseImage->getPath());
            $newUploadedImage = new UploadedFile($baseImagePath, basename($baseImagePath));
            $newImage->setFile($newUploadedImage);

            $this->imageUploader->upload($newImage);

            $to->addImage($newImage);
        }
    }

    private function uploadImages(
        DraftInterface $productDraft
    ): void {
        foreach ($productDraft->getImages() as $image) {
            $this->imageUploader->upload($image);
        }
    }
}
