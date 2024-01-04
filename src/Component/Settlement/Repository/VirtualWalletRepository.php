<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Repository;

use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelInterface;

final class VirtualWalletRepository extends EntityRepository implements VirtualWalletRepositoryInterface
{
    public function findByVendorAndChannel(VendorInterface $vendor, ChannelInterface $channel): ?VirtualWalletInterface
    {
        return $this->createQueryBuilder('wv')
            ->andWhere('wv.vendor = :vendor')
            ->andWhere('wv.channel = :channel')
            ->setParameter('vendor', $vendor)
            ->setParameter('channel', $channel)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findAllByVendorQueryBuilder(VendorInterface $vendor): QueryBuilder
    {
        $result = $this->createQueryBuilder('wv')
            ->andWhere('wv.vendor = :vendor')
            ->setParameter('vendor', $vendor);

        return $result;
    }
}
