<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftTaxon;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class DraftTaxonFactory implements DraftTaxonFactoryInterface
{
    public function createForTaxon(
        TaxonInterface $taxon,
        ProductDraftInterface $productDraft
    ): ProductDraftTaxonInterface {
        $draftTaxon = new ProductDraftTaxon();
        $draftTaxon->setTaxon($taxon);
        $draftTaxon->setProductDraft($productDraft);

        return $draftTaxon;
    }
}
