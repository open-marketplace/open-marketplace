<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;

final class ChangeVisibilityAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    public function __construct(ProductListingRepositoryInterface $productListingRepository,)
    {
        $this->productListingRepository = $productListingRepository;
    }

    public function __invoke(Request $request)
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $productListing->setHidden(!$productListing->isHidden());

        if($productListing->getProduct()) {
            $product = $productListing->getProduct();

        }
    }

}
