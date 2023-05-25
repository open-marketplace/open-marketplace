<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;

interface DraftTaxonFactoryInterface
{
    public function createForTaxon(
        TaxonInterface $taxon,
        ProductDraftInterface $productDraft
    ): ProductDraftTaxonInterface;
}
