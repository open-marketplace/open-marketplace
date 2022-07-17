<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\AcceptanceOperator\ProductDraftAcceptanceOperatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductRepositoryInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

final class ProductDraftCallbacks
{
    private FlashBagInterface $session;

    private ProductDraftAcceptanceOperatorInterface $productDraftService;

    private ProductRepositoryInterface $productRepository;

    private ProductDraftRepositoryInterface $productDraftRepository;

    public function __construct(
        FlashBagInterface $session,
        ProductDraftAcceptanceOperatorInterface $productDraftService,
        ProductRepositoryInterface $productRepository,
        ProductDraftRepositoryInterface $productDraftRepository
    ) {
        $this->session = $session;
        $this->productDraftService = $productDraftService;
        $this->productRepository = $productRepository;
        $this->productDraftRepository = $productDraftRepository;
    }

    public function accept(ProductDraftInterface $productDraft): void
    {
        $product = $this->productDraftService->acceptProductDraft($productDraft);
        $productDraft->accept();
        $this->productRepository->save($product);
        $this->productDraftRepository->save($productDraft);

        $this->session->add('success', 'bitbag_mvm_plugin.ui.product_listing_accepted');
    }

    public function reject(ProductDraftInterface $productDraft): void
    {
        $productDraft->reject();
        $this->productDraftRepository->save($productDraft);

        $this->session->add('warning', 'bitbag_mvm_plugin.ui.product_listing_rejected');
    }

    public function sendToVerify(ProductDraftInterface $productDraft): void
    {
        $productDraft->sendToVerification();
        $this->productDraftRepository->save($productDraft);
    }
}
