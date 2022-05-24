<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use SM\Factory\Factory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

final class AcceptAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private Environment $twig;

    private RouterInterface $router;

    private Factory $SMFactory;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        Environment $twig,
        RouterInterface $router,
        Factory $SMFactory
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->twig = $twig;
        $this->router = $router;
        $this->SMFactory = $SMFactory;
    }

    public function __invoke(Request $request)
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $productListingSM = $this->SMFactory->get($productListing, 'product_listing');

        if ($productListingSM->can('accept_product_listing')) {
            $productListingSM->apply('accept_product_listing');
        }

        return new RedirectResponse($this->router->generate('bitbag_sylius_multi_vendor_marketplace_plugin_admin_product_listing_index'));
    }
}
