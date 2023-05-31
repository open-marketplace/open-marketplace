<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxon;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class DraftTaxonFactory implements DraftTaxonFactoryInterface
{
    public function createForTaxon(
        TaxonInterface $taxon,
        DraftInterface $productDraft
    ): DraftTaxonInterface {
        $draftTaxon = new DraftTaxon();
        $draftTaxon->setTaxon($taxon);
        $draftTaxon->setProductDraft($productDraft);

        return $draftTaxon;
    }
}
