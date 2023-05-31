<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Resolver;

use BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Cloner\DraftClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class NextDraftResolver implements NextDraftResolverInterface
{
    public function __construct(
        private FactoryInterface $draftFactory,
        private DraftClonerInterface $draftCloner,
        private EntityManagerInterface $entityManager
    ) {

    }

    public function resolveForListing(ListingInterface $listing): DraftInterface
    {
        $latestDraft = $listing->getLatestDraft();

        if ($listing->needsNewDraft()) {
            $newProductDraft = $this->createNextDraft($latestDraft);
            $listing->insertDraft($newProductDraft);

            // Important. The flush here prevents to re-upload trashy images on every render the listing edit form
            $this->entityManager->flush();
        }

        return $listing->getLatestDraft();
    }

    private function createNextDraft(DraftInterface $base): DraftInterface
    {
        $destination = $this->draftFactory->createNew();
        $destination->markAsCreated();

        $this->draftCloner->cloneDraft($base, $destination);

        $destination->setVersionNumber($base->getVersionNumber());
        $destination->incrementVersion();

        return $destination;
    }
}
