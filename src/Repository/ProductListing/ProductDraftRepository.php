<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ProductDraftRepository extends EntityRepository implements ProductDraftRepositoryInterface
{
    public function save(DraftInterface $productDraft): void
    {
        $this->_em->persist($productDraft);
        $this->_em->flush();
    }

    public function findLatestDraft(ListingInterface $listing): ?DraftInterface
    {
        return $this->createQueryBuilder('pd')
            ->andWhere('pd.productListing = :productListing')
            ->setParameter('productListing', $listing)
            ->orderBy('pd.id', 'desc')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
            ;
    }
}
