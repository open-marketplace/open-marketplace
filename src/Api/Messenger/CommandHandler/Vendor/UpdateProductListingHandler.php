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
use BitBag\OpenMarketplace\Component\ProductListing\ProductListingAdministrationToolInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
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

    public function __invoke(UpdateProductListingInterface $updateProductListing): ProductListingInterface
    {
        /** @var ProductListingInterface $productListing */
        $productListingId = $updateProductListing->getProductListing()->getId();
        $productListing = $this->productListingRepository->find($productListingId);
        Assert::isInstanceOf($productListing, ProductListingInterface::class);

        /** @var ProductDraftInterface $newDraft */
        $newDraft = $updateProductListing->getProductDraft();

        $this->productListingAdministrationTool->updateLatestDraftWith($productListing, $newDraft);

        return $productListing;
    }
}
