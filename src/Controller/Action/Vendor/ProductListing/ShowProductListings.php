<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShowProductListings extends AbstractController
{
    private ProductListingRepositoryInterface $productListingRepository;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository
    ) {
        $this->productListingRepository = $productListingRepository;
    }

    public function __invoke(Request $request): Response
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->findBy(['vendor' => $this->getUser()->getId()]);

        return new Response(
            $this->renderView('@BitBagSyliusMultiVendorMarketplacePlugin/Vendor/ProductListing/show_product_listing.html.twig', [
                    'productListings' => $productListing
                ])
        );
    }
}
