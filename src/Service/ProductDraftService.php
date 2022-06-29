<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Service;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductFromDraftUpdaterInterface;

final class ProductDraftService implements ProductDraftServiceInterface
{
    private ProductDraftRepositoryInterface $productDraftRepository;

    private ProductFromDraftFactoryInterface $productFromDraftFactory;

    private ProductRepositoryInterface $productRepository;

    private ProductFromDraftUpdaterInterface $productFromDraftUpdater;

    public function __construct(
        ProductDraftRepositoryInterface $productDraftRepository,
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductRepositoryInterface $productRepository,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater
    ) {
        $this->productDraftRepository = $productDraftRepository;
        $this->productFromDraftFactory = $productFromDraftFactory;
        $this->productRepository = $productRepository;
        $this->productFromDraftUpdater = $productFromDraftUpdater;
    }

    public function acceptProductDraft(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_VERIFIED);
        $productDraft->setVerifiedAt((new \DateTime()));
        $productDraft->setIsVerified(true);

        if (!$productDraft->getProductListing()->getProduct()) {
            $product = $this->productFromDraftFactory->createSimpleProduct($productDraft);
        } else {
            $product = $this->productFromDraftUpdater->updateProduct($productDraft);
        }

        $this->productRepository->save($product);
    }

    public function rejectProductDraft(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_REJECTED);
        $productDraft->setVerifiedAt((new \DateTime()));
        $this->productDraftRepository->save($productDraft);
    }

    public function sendToVerification(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
        $productDraft->setPublishedAt((new \DateTime()));
        $this->productDraftRepository->save($productDraft);
    }
}
