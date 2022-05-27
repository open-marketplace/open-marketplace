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
use SM\Factory\FactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

final class RejectAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private RouterInterface $router;

    private FactoryInterface $SMFactory;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router,
        FactoryInterface $SMFactory
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->router = $router;
        $this->SMFactory = $SMFactory;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $productListingSM = $this->SMFactory->get($productListing, 'product_listing');

        if ($productListingSM->can('reject_product_listing')) {
            $productListingSM->apply('reject_product_listing');
        }

        return new RedirectResponse($this->router->generate('bitbag_sylius_multi_vendor_marketplace_plugin_admin_product_listing_index'));
    }
}
