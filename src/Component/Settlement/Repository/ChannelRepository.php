<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Repository;

use Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository as BaseChannelRepository;
use Sylius\Component\Core\Model\ChannelInterface;

class ChannelRepository extends BaseChannelRepository implements ChannelRepositoryInterface
{
    public function findAllEnabled(): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.enabled = true')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneEnabledByCode(string $code): ?ChannelInterface
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.code = :code')
            ->andWhere('o.enabled = true')
            ->setParameter('code', $code)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
