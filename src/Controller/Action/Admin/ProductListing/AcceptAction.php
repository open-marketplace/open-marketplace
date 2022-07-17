<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Admin\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

final class AcceptAction
{
    private ProductListingRepositoryInterface $productListingRepository;

    private RouterInterface $router;

    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    private ProductDraftRepositoryInterface $productDraftRepository;

    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router,
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductDraftRepositoryInterface $productDraftRepository
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->router = $router;
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
        $this->productDraftRepository = $productDraftRepository;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingRepository->find($request->attributes->get('id'));

        /** @var ProductDraftInterface $latestProductDraft */
        $latestProductDraft = $this->productDraftRepository->findProductListingLatestProductDraft($productListing);

        $this->productDraftStateMachineTransition->applyIfCan($latestProductDraft, ProductDraftTransitions::TRANSITION_ACCEPT);

        return new RedirectResponse($this->router->generate('bitbag_mvm_plugin_admin_product_listing_index'));
    }
}
