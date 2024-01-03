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
use BitBag\OpenMarketplace\Component\ProductListing\Repository\DraftImageRepository;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Gaufrette\Filesystem;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ListingPersister implements ListingPersisterInterface
{
    public function __construct(
        private FactoryInterface $productListingFactory,
        private DraftClonerInterface $draftCloner,
        private DraftGeneratorInterface $draftGenerator,
        private ImageUploaderInterface $imageUploader,
        private Filesystem $filesystem,
        private DraftImageRepository $draftRepository,
        private EntityManagerInterface $entityManager
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
        return $this->draftGenerator->generateNextDraft($listing);
    }

    public function updateLatestDraftWith(
        ListingInterface $listing,
        DraftInterface $base
    ): void {
        $destination = $this->resolveLatestDraft($listing);
        $this->draftCloner->clone($base, $destination);
        $this->uploadImages($destination);
    }

    public function uploadImages(
        DraftInterface $productDraft
    ): void {
        foreach ($productDraft->getImages() as $image) {
            $this->imageUploader->upload($image);
        }
    }

    public function deleteImages(DraftInterface $productDraft): void
    {
        $productDraftImages = $this->draftRepository->findVendorDraftImages($productDraft);
        foreach ($productDraftImages as $image) {
            if (null !== $image && null !== $image->getPath()) {
                $this->entityManager->remove($image);

                /** @var string $key */
                $key = $image->getPath();
                if ($this->filesystem->has($key)) {
                    $this->filesystem->delete($key);
                }
            }
        }
    }
}
