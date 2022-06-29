<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\ProductDraftServiceInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

final class ProductDraftCallbacks
{
    private FlashBagInterface $session;

    private ProductDraftServiceInterface $productDraftService;

    public function __construct(
        FlashBagInterface $session,
        ProductDraftServiceInterface $productDraftService
    ) {
        $this->session = $session;
        $this->productDraftService = $productDraftService;
    }

    public function sendToVerify(ProductDraftInterface $productDraft): void
    {
        $this->productDraftService->sendToVerification($productDraft);
    }

    public function accept(ProductDraftInterface $productDraft): void
    {
        $this->productDraftService->acceptProductDraft($productDraft);

        $this->session->add('success', 'bitbag_mvm_plugin.ui.product_listing_accepted');
    }

    public function reject(ProductDraftInterface $productDraft): void
    {
        $this->productDraftService->rejectProductDraft($productDraft);

        $this->session->add('warning', 'bitbag_mvm_plugin.ui.product_listing_rejected');
    }
}
