<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Provider;

use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;

final class TaxonProvider implements TaxonProviderInterface
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
