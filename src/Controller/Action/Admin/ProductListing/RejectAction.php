<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use SM\Factory\Factory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Twig\Environment;

final class RejectAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private Environment $twig;

    private Router $router;

    private Factory $SMFactory;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        Environment $twig,
        Router $router,
        Factory $SMFactory
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->twig = $twig;
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
