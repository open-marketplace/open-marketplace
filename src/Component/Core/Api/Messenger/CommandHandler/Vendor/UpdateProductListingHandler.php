<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Component\Core\Api\Messenger\Command\Vendor\UpdateProductListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use Webmozart\Assert\Assert;

final class UpdateProductListingHandler
{
    public function __construct(
        private ListingPersisterInterface $listingPersister,
        private ListingRepositoryInterface $productListingRepository
    ) {
    }

    public function __invoke(UpdateProductListingInterface $updateProductListing): ListingInterface
    {
        /** @var int $productListingId */
        $productListingId = $updateProductListing->getProductListing()
            ?->getId();
        Assert::integer($productListingId);

        /** @var ListingInterface $productListing */
        $productListing = $this->productListingRepository->find($productListingId);
        Assert::isInstanceOf($productListing, ListingInterface::class);

        /** @var DraftInterface $newDraft */
        $newDraft = $updateProductListing->getProductDraft();
        Assert::isInstanceOf($newDraft, DraftInterface::class);

        $newDraft->setProductListing($productListing);

        $previousDraft = $productListing->getLatestDraft();
        Assert::isInstanceOf($previousDraft, DraftInterface::class);

        $newDraft->setCode($previousDraft->getCode());

        $this->listingPersister->updateLatestDraftWith($productListing, $newDraft);

        return $productListing;
    }
}
