<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Repository;

use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository as BaseTaxonRepository;
use Sylius\Component\Taxonomy\Model\TaxonInterface;

final class TaxonRepository extends BaseTaxonRepository implements TaxonRepositoryInterface
{
    public function findForVendorPage(?string $slug, string $locale): ?TaxonInterface
    {
        if (null === $slug) {
            $qb = $this->createListQueryBuilder()
                ->andWhere('o.parent IS NULL')
                ->getQuery()
                ->getOneOrNullResult()
            ;

            return $qb;
        }

        return $this->findOneBySlug($slug, $locale);
    }
}
