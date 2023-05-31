<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;

interface DraftTaxonFactoryInterface
{
    public function createForTaxon(
        TaxonInterface $taxon,
        DraftInterface $draft
    ): DraftTaxonInterface;
}
