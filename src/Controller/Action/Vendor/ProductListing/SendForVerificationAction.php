<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Action\Vendor\ProductListing;

use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\OpenMarketplace\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\OpenMarketplace\Transitions\ProductDraftTransitions;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;

final class SendForVerificationAction
{
    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    private ProductDraftRepositoryInterface $productDraftRepository;

    private ProductListingRepositoryInterface $productListingRepository;

    private RouterInterface $router;

    private Session $session;

    public function __construct(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductDraftRepositoryInterface $productDraftRepository,
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router,
        Session $session
    ) {
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
        $this->productDraftRepository = $productDraftRepository;
        $this->productListingRepository = $productListingRepository;
        $this->router = $router;
        $this->session = $session;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $listing = $this->productListingRepository->find($request->get('id'));

        /** @var ProductDraftInterface $productDraft */
        $productDraft = $this->productDraftRepository->findLatestDraft($listing);

        if (null != $productDraft && ProductDraftInterface::STATUS_CREATED === $productDraft->getStatus()) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
        }

        $this->session->getFlashBag()->add(
            'success',
            'open_marketplace.ui.product_listing_sent_to_verification',
        );

        return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listing_index'));
    }
}
