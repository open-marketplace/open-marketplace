<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Repository;

use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

final class SettlementRepository extends EntityRepository implements SettlementRepositoryInterface
{
    public function findLastByVendor(VendorInterface $vendor): ?SettlementInterface
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.vendor', 'vendor')
            ->andWhere('vendor = :vendor')
            ->setParameter('vendor', $vendor)
            ->orderBy('s.endDate', self::ORDER_DESCENDING)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
