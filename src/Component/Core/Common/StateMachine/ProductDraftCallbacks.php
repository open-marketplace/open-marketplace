<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\StateMachine;

use BitBag\OpenMarketplace\Component\ProductListing\DraftConverterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;

final class ProductDraftCallbacks
{
    public function __construct(
        private RequestStack $requestStack,
        private DraftConverterInterface $productDraftService,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function sendToVerification(DraftInterface $productDraft): void
    {
        $productListing = $productDraft->getProductListing();
        $flashBag = $this->getFlashBag();

        $productListing->sendToVerification($productDraft);
        $this->entityManager->flush();

        $flashBag->add('warning', 'open_marketplace.ui.product_listing_sent_to_verification');
    }

    public function accept(DraftInterface $productDraft): void
    {
        $product = $this->productDraftService->convertToSimpleProduct($productDraft);
        $flashBag = $this->getFlashBag();

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $flashBag->add('success', 'open_marketplace.ui.product_listing_accepted');
    }

    public function reject(DraftInterface $productDraft): void
    {
        $productListing = $productDraft->getProductListing();
        $flashBag = $this->getFlashBag();

        $productListing->reject();
        $this->entityManager->flush();

        $flashBag->add('warning', 'open_marketplace.ui.product_listing_rejected');
    }

    private function getFlashBag(): FlashBagInterface
    {
        /** @var Session $session */
        $session = $this->requestStack->getSession();

        return $session->getFlashBag();
    }
}
