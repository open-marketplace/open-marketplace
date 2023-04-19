<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Provider;

use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;

final class TaxonProvider
{
    private TaxonRepositoryInterface $taxonRepository;

    public function __construct(TaxonRepositoryInterface $taxonRepository)
    {
        $this->taxonRepository = $taxonRepository;
    }

    public function provideForVendorPage(?string $slug, string $locale): ?TaxonInterface
    {
        if (null === $slug) {
            $qb = $this->taxonRepository->createListQueryBuilder()
                ->andWhere('o.parent IS NULL')
                ->getQuery()
                ->getOneOrNullResult()
            ;

            return $qb;
        }

        return $this->taxonRepository->findOneBySlug($slug, $locale);
    }
}
