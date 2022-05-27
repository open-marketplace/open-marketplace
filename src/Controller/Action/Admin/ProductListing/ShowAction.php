<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class ShowAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private Environment $twig;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        Environment $twig
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->twig = $twig;
    }

    public function __invoke(Request $request): Response
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        return new Response(
            $this->twig->render('@BitBagSyliusMultiVendorMarketplacePlugin/Admin/ProductListing/show_product_listing.html.twig', [
                'productListing' => $productListing
            ])
        );
    }
}
