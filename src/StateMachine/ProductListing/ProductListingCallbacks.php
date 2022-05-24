<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepository;

final class ProductListingCallbacks
{
    private ProductListingRepository $productListingRepository;

    public function __construct(ProductListingRepository $productListingRepository)
    {
        $this->productListingRepository = $productListingRepository;
    }

    public function sendToVerify(ProductListingInterface $productListing)
    {
        $productListing->setStatus(ProductListingInterface::STATUS_UNDER_VERIFICATION);
        $this->productListingRepository->flush();
    }

    public function verify(ProductListingInterface $productListing)
    {
        $productListing->setStatus(ProductListingInterface::STATUS_VERIFIED);
        $this->productListingRepository->flush();
    }

    public function reject(ProductListingInterface $productListing)
    {
        $productListing->setStatus(ProductListingInterface::STATUS_REJECTED);
        $this->productListingRepository->flush();
    }
}
