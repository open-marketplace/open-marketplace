<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShowProductListings extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        return new Response(
            $this->renderView('@BitBagSyliusMultiVendorMarketplacePlugin/Vendor/ProductListing/show_product_listing.html.twig', [
                    'productListings' => $this->getUser()->getCustomer()->getVendor()->getProductListings()
                ])
        );
    }
}
