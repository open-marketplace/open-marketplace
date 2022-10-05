<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Admin\ProductListing;

use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\OpenMarketplace\Transitions\ProductDraftTransitions;
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
        $latestProductDraft = $this->productDraftRepository->findLatestDraft($productListing);

        $this->productDraftStateMachineTransition->applyIfCan($latestProductDraft, ProductDraftTransitions::TRANSITION_ACCEPT);

        return new RedirectResponse($this->router->generate('open_marketplace_admin_product_listing_index'));
    }
}
