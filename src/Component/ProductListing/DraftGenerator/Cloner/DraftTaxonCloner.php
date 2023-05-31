<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftTaxonFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Doctrine\ORM\EntityManagerInterface;

final class DraftTaxonCloner implements DraftTaxonClonerInterface
{
    public function __construct(
        private DraftTaxonFactoryInterface $draftTaxonFactory,
        private EntityManagerInterface $entityManager
    ) {

    }

    public function clone(
        DraftInterface $from,
        DraftInterface $to
    ): void {
        foreach ($from->getProductDraftTaxons() as $baseDraftTaxon) {
            $draftTaxon = $this->draftTaxonFactory->createForTaxon(
                $baseDraftTaxon->getTaxon(),
                $to
            );
            $draftTaxon->setPosition($baseDraftTaxon->getPosition());
            $to->addProductDraftTaxon($draftTaxon);

            $this->entityManager->persist($draftTaxon);
        }
    }
}
