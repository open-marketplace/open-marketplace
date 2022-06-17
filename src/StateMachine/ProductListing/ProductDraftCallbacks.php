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
use BitBag\SyliusMultiVendorMarketplacePlugin\Helper\CreateProductFromDraftHelperInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Helper\UpdateProductFromDraftHelperInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

final class ProductDraftCallbacks
{
    private EntityManagerInterface $entityManager;

    private CreateProductFromDraftHelperInterface $createProductFromDraftHelper;

    private FlashBagInterface $session;

    private UpdateProductFromDraftHelperInterface $updateProductFromDraftHelper;

    public function __construct(
        EntityManagerInterface $entityManager,
        CreateProductFromDraftHelperInterface $createProductFromDraftHelper,
        FlashBagInterface $session,
        UpdateProductFromDraftHelperInterface $updateProductFromDraftHelper
    ) {
        $this->entityManager = $entityManager;
        $this->createProductFromDraftHelper = $createProductFromDraftHelper;
        $this->session = $session;
        $this->updateProductFromDraftHelper = $updateProductFromDraftHelper;
    }

    public function sendToVerify(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
        $this->entityManager->flush();
    }

    public function verify(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_VERIFIED);
        $productDraft->setVerifiedAt((new \DateTime()));
        $productDraft->setIsVerified(true);

        if (!$productDraft->getProductListing()->getProduct()) {
            $this->createProductFromDraftHelper->createSimpleProduct($productDraft);
        }

        $this->updateProductFromDraftHelper->updateProduct($productDraft);
        $this->session->add('success', 'Product listing verified.');
    }

    public function reject(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_REJECTED);
        $productDraft->setVerifiedAt((new \DateTime()));
        $this->entityManager->flush();

        $this->session->add('warning', 'Product listing rejected.');
    }
}
