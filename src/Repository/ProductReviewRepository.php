<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductReviewRepository as BasicProductReviewRepository;

class ProductReviewRepository extends BasicProductReviewRepository implements ProductReviewRepositoryInterface
{
    public function createVendorReviewsQueryBuilder(VendorInterface $vendor): QueryBuilder
    {
        $qb = $this->createQueryBuilder('pr');

        return $qb->innerJoin('pr.reviewSubject', 'rs')
            ->andWhere($qb->expr()->eq('rs.vendor', ':vendorId'))
            ->setParameter('vendorId', $vendor->getId(), Types::BIGINT)
            ;
    }
}
