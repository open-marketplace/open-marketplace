<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository as BaseOrderRepository;
use Sylius\Component\Order\Model\OrderInterface as OrderInterfaceAlias;

class OrderRepository extends BaseOrderRepository
{
    public function findAllByVendor(VendorInterface $vendor): QueryBuilder
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ;
    }

    public function findOrderForVendor(VendorInterface $vendor, string $id): ?OrderInterface
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->andWhere('o.id = :id')
            ->setParameter('vendor', $vendorId)
            ->setParameter('id', $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOrdersForVendorByCustomer(VendorInterface $vendor, string $id): QueryBuilder
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->leftJoin('o.customer', 'c')
            ->andWhere('o.vendor = :vendor')
            ->andWhere('c.id = :id')
            ->setParameter('vendor', $vendorId)
            ->setParameter('id', $id);
    }

    public function createByCustomerAndChannelIdAndSecondaryQueryBuilder(int $customerId, int $channelId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.customer = :customerId')
            ->andWhere('o.channel = :channelId')
            ->andWhere('o.state != :state')
            ->andWhere('o.mode = :secondaryOrderMode')
            ->setParameter('secondaryOrderMode', OrderInterface::SECONDARY_ORDER_MODE)
            ->setParameter('customerId', $customerId)
            ->setParameter('channelId', $channelId)
            ->setParameter('state', OrderInterfaceAlias::STATE_CART)
            ;
    }
}
