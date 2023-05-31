<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\CreateProductListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ProductListingAdministrationToolInterface;
use Doctrine\Persistence\ObjectManager;

final class CreateProductListingHandler
{
    private ProductListingAdministrationToolInterface $productListingAdministrationTool;

    private ObjectManager $manager;

    public function __construct(
        ProductListingAdministrationToolInterface $productListingAdministrationTool,
        ObjectManager $manager
    ) {
        $this->productListingAdministrationTool = $productListingAdministrationTool;
        $this->manager = $manager;
    }

    public function __invoke(CreateProductListingInterface $createProductListing): ListingInterface
    {
        /** @var DraftInterface $productDraft */
        $productDraft = $createProductListing->getProductDraft();
        $vendor = $createProductListing->getVendor();

        $this->productListingAdministrationTool->createNewProductListing($productDraft, $vendor);
        $this->manager->persist($productDraft->getProductListing());

        return $productDraft->getProductListing();
    }
}
