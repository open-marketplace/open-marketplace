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
use BitBag\OpenMarketplace\Component\ProductListing\ProductListingAdministrationToolInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Webmozart\Assert\Assert;

final class UpdateProductListingHandler
{
    private ProductListingAdministrationToolInterface $productListingAdministrationTool;

    private ObjectManager $manager;

    private ProductListingRepositoryInterface $productListingRepository;

    public function __construct(
        ProductListingAdministrationToolInterface $productListingAdministrationTool,
        ObjectManager $manager,
        ProductListingRepositoryInterface $productListingRepository
    ) {
        $this->productListingAdministrationTool = $productListingAdministrationTool;
        $this->manager = $manager;
        $this->productListingRepository = $productListingRepository;
    }

    public function __invoke(UpdateProductListingInterface $updateProductListing): ListingInterface
    {
        /** @var ListingInterface $productListing */
        $productListingId = $updateProductListing->getProductListing()->getId();
        $productListing = $this->productListingRepository->find($productListingId);
        Assert::isInstanceOf($productListing, ListingInterface::class);

        /** @var DraftInterface $newDraft */
        $newDraft = $updateProductListing->getProductDraft();

        $this->productListingAdministrationTool->updateLatestDraftWith($productListing, $newDraft);

        return $productListing;
    }
}
