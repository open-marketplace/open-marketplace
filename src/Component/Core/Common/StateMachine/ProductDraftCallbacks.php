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

final class ProductDraftCallbacks
{
    public function __construct(
        private DraftConverterInterface $productDraftService,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function sendToVerification(DraftInterface $productDraft): void
    {
        $productListing = $productDraft->getProductListing();

        $productListing->sendToVerification($productDraft);
        $this->entityManager->flush();
    }

    public function accept(DraftInterface $productDraft): void
    {
        $product = $this->productDraftService->convertToSimpleProduct($productDraft);

        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    public function reject(DraftInterface $productDraft): void
    {
        $productListing = $productDraft->getProductListing();

        $productListing->reject();
        $this->entityManager->flush();
    }
}
