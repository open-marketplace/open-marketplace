<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelInterface;

final class VendorShippingMethodRepository extends EntityRepository implements VendorShippingMethodRepositoryInterface
{
    public function findEnabledForChannel(VendorInterface $vendor, ChannelInterface $channel): array
    {
        return $this
            ->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->andWhere('o.channelCode = :channelCode')
            ->setParameter('vendor', $vendor)
            ->setParameter('channelCode', $channel->getCode())
            ->getQuery()
            ->getResult()
        ;
    }
}
