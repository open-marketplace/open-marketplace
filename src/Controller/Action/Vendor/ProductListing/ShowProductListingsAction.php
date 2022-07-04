<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShowProductListingsAction extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        /** @var ShopUserInterface $user */
        $user = $this->getUser();

        $vendor = $user->getVendor();

        if (null === $vendor) {
            return new Response(
                $this->renderView('sylius_shop_homepage')
            );
        }

        return new Response(
            $this->renderView('@BitBagSyliusMultiVendorMarketplacePlugin/Vendor/ProductListing/show_product_listing.html.twig', [
                'productListings' => $vendor->getProductListings(),
            ])
        );
    }
}
