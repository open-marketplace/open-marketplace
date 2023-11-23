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
use Sylius\Component\Core\Model\ChannelInterface;

final class SettlementRepository extends EntityRepository implements SettlementRepositoryInterface
{
    public function findLastByVendorAndChannel(VendorInterface $vendor, ChannelInterface $channel): ?SettlementInterface
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.vendorId = :vendorId')
            ->andWhere('s.channelId = :channelId')
            ->setParameter('vendorId', $vendor->getId())
            ->setParameter('channelId', $channel->getId())
            ->orderBy('s.endDate', self::ORDER_DESCENDING)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
