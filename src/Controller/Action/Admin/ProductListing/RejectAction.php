<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductListingStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductListingTransitions;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

final class RejectAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private RouterInterface $router;

    private ProductListingStateMachineTransitionInterface $productListingStateMachineTransition;


    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router,
        ProductListingStateMachineTransitionInterface $productListingStateMachineTransition
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->router = $router;
        $this->productListingStateMachineTransition = $productListingStateMachineTransition;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        $this->productListingStateMachineTransition->apply($productListing, ProductListingTransitions::TRANSITION_REJECT);

        return new RedirectResponse($this->router->generate('bitbag_sylius_multi_vendor_marketplace_plugin_admin_product_listing_index'));
    }
}
