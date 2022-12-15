<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UpdateProductListingInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;

final class UpdateProductListingHandler
{
    private ObjectManager $manager;

    private ImageUploaderInterface $imageUploader;

    public function __construct(
        ObjectManager $manager,
        ImageUploaderInterface $imageUploader
    ) {
        $this->manager = $manager;
        $this->imageUploader = $imageUploader;
    }

    public function __invoke(UpdateProductListingInterface $updateProductListing): ProductListingInterface
    {
        /** @var ProductDraftInterface $newProductDraft */
        $newProductDraft = $updateProductListing->getProductDraft();
        /** @var ProductListingInterface $productListing */
        $productListing = $updateProductListing->getProductListing();
        /** @var ProductDraftInterface $previousProductDraft */
        $previousProductDraft = $productListing->getLatestDraft();

        $newProductDraft->setVersionNumber($previousProductDraft->getVersionNumber());
        $newProductDraft->incrementVersion();
        $newProductDraft->setCode($previousProductDraft->getCode());

        foreach ($newProductDraft->getImages() as $productImage) {
            $productImage->setOwner($newProductDraft);
            $this->imageUploader->upload($productImage);
        }

        $productListing->addProductDraft($newProductDraft);

        $this->manager->persist($productListing);

        return $productListing;
    }
}
