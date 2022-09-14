<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Controller\Action\Vendor\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class SendForVerificationAction extends AbstractController
{
    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    private ProductDraftRepositoryInterface $productDraftRepository;

    private ProductListingRepositoryInterface $productListingRepository;

    private RouterInterface $router;

    public function __construct(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductDraftRepositoryInterface $productDraftRepository,
        ProductListingRepositoryInterface $productListingRepository,
        RouterInterface $router
    )
    {
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
        $this->productDraftRepository = $productDraftRepository;
        $this->productListingRepository = $productListingRepository;
        $this->router = $router;
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $listing = $this->productListingRepository->find($request->get('id'));
        $productDraft = $this->productDraftRepository->findLatestDraft($listing);

        if (ProductDraftInterface::STATUS_CREATED === $productDraft->getStatus()) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
        }

        $this->addFlash('success', 'bitbag_mvm_plugin.ui.product_listing_created_and_sent_to_verification');

        return new RedirectResponse($this->router->generate('bitbag_mvm_plugin_vendor_product_listing_index'));
    }
}
