<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Controller\ProductListing;

use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftTransitions;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\DraftRepositoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Repository\ListingRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;

final class SendForVerificationAction
{
    public function __construct(
        private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        private DraftRepositoryInterface $productDraftRepository,
        private ListingRepositoryInterface $productListingRepository,
        private RouterInterface $router,
        private Session $session
    ) {
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $listing = $this->productListingRepository->find($request->get('id'));

        /** @var DraftInterface $productDraft */
        $productDraft = $this->productDraftRepository->findLatestDraft($listing);

        if (null != $productDraft && DraftInterface::STATUS_CREATED === $productDraft->getStatus()) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, DraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
        }

        return new RedirectResponse($this->router->generate('open_marketplace_vendor_product_listing_index'));
    }
}
