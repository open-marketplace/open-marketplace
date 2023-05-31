<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxon;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class DraftTaxonFactory implements DraftTaxonFactoryInterface
{
    public function createForTaxon(
        TaxonInterface $taxon,
        DraftInterface $draft
    ): DraftTaxonInterface {
        $draftTaxon = new DraftTaxon();
        $draftTaxon->setTaxon($taxon);
        $draftTaxon->setProductDraft($draft);

        return $draftTaxon;
    }
}
