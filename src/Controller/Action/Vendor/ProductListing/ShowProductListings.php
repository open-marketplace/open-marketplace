<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShowProductListings extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        /** @var ShopUserInterface $user */
        $user = $this->getUser();
        /** @var CustomerInterface $customer */
        $customer = $user->getCustomer();
        $vendor = $customer->getVendor();

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
