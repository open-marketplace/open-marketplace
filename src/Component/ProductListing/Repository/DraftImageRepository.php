<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace BitBag\OpenMarketplace\Component\ProductListing\Repository;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

final class DraftImageRepository extends EntityRepository implements DraftImageRepositoryInterface
{
    public function findVendorDraftImages(DraftInterface $draft): array
    {
        $queryBuilder = $this->findVendorDraftImagesQuery($draft);

        return $queryBuilder
            ->getQuery()
            ->getResult()
            ;
    }

    public function findVendorDraftImagesQuery(DraftInterface $draft): QueryBuilder
    {
        $draftId = $draft->getId();

        return $this->createQueryBuilder('o')
            ->andWhere('o.owner = :draft')
            ->setParameter('draft', $draftId)
            ;
    }
}
