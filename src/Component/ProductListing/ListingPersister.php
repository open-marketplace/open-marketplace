<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner\DraftClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\DraftGeneratorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ListingPersister implements ListingPersisterInterface
{
    public function __construct(
        private FactoryInterface $productListingFactory,
        private DraftClonerInterface $draftCloner,
        private DraftGeneratorInterface $nextDraftResolver,
        private ImageUploaderInterface $imageUploader,
    ) {

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
        $productDraft->ownRelations();

        $this->uploadImages($productDraft);
    }

    public function resolveLatestDraft(
        ListingInterface $listing
    ): DraftInterface {
        return $this->nextDraftResolver->generateNextDraft($listing);
    }

    public function updateLatestDraftWith(
        ListingInterface $listing,
        DraftInterface $base
    ): void {
        $destination = $this->resolveLatestDraft($listing);
        $this->draftCloner->cloneDraft($base, $destination);
        $this->uploadImages($destination);
    }

    public function uploadImages(
        DraftInterface $productDraft
    ): void {
        foreach ($productDraft->getImages() as $image) {
            $this->imageUploader->upload($image);
        }
    }
}
