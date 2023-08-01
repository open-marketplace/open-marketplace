<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\StateMachine;

use BitBag\OpenMarketplace\AcceptanceOperator\ProductDraftAcceptanceOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

final class ProductDraftCallbacks
{
    public function __construct(
        private FlashBagInterface $session,
        private ProductDraftAcceptanceOperatorInterface $productDraftService,
        private EntityManagerInterface $entityManager
    ) {

    }

    public function sendToVerification(DraftInterface $productDraft): void
    {
        $productListing = $productDraft->getProductListing();
        $productListing->sendToVerification($productDraft);

        $this->entityManager->flush();

        $this->session->add('warning', 'open_marketplace.ui.product_listing_sent_to_verification');
    }

    public function accept(DraftInterface $productDraft): void
    {
        $product = $this->productDraftService->acceptProductDraft($productDraft);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->session->add('success', 'open_marketplace.ui.product_listing_accepted');
    }

    public function reject(DraftInterface $productDraft): void
    {
        $productListing = $productDraft->getProductListing();
        $productListing->reject();

        $this->entityManager->flush();

        $this->session->add('warning', 'open_marketplace.ui.product_listing_rejected');
    }
}
