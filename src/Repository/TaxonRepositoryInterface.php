<?php

namespace BitBag\OpenMarketplace\Repository;

use Sylius\Component\Taxonomy\Model\TaxonInterface;

interface TaxonRepositoryInterface
{
    public function findForVendorPage(?string $slug, string $locale): ?TaxonInterface;
}
