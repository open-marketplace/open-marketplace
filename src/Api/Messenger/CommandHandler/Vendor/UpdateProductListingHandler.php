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
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Webmozart\Assert\Assert;

final class UpdateProductListingHandler
{
    private ListingPersisterInterface $listingPersister;

    private ObjectManager $manager;

    private ListingRepositoryInterface $productListingRepository;

    public function __construct(
        ListingPersisterInterface $listingPersister,
        ObjectManager $manager,
        ListingRepositoryInterface $productListingRepository
    ) {
        $this->listingPersister = $listingPersister;
        $this->manager = $manager;
        $this->productListingRepository = $productListingRepository;
    }

    public function __invoke(UpdateProductListingInterface $updateProductListing): ListingInterface
    {
        $productListingId = $updateProductListing->getProductListing()
            ->getId();

        /** @var ListingInterface $productListing */
        $productListing = $this->productListingRepository->find($productListingId);
        Assert::isInstanceOf($productListing, ListingInterface::class);

        /** @var DraftInterface $newDraft */
        $newDraft = $updateProductListing->getProductDraft();
        $newDraft->setProductListing($productListing);
        $newDraft->setCode($productListing->getLatestDraft()->getCode());

        $this->listingPersister->updateLatestDraftWith($productListing, $newDraft);

        return $productListing;
    }
}
