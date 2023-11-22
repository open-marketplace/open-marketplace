<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Repository;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\DTO\SettlementDTO;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository as BaseOrderRepository;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\OrderPaymentStates;
use Sylius\Component\Order\Model\OrderInterface as OrderInterfaceAlias;

class OrderRepository extends BaseOrderRepository implements OrderRepositoryInterface
{
    public function findAllByVendorQueryBuilder(VendorInterface $vendor): QueryBuilder
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ;
    }

    public function findAllSecondaryOrders(): QueryBuilder
    {
        $queryBuilder = $this->createListQueryBuilder();
        $alias = $queryBuilder->getRootAliases()[0];

        return $queryBuilder
            ->andWhere(sprintf('%s.mode = :mode', $alias))
            ->setParameter('mode', OrderInterface::SECONDARY_ORDER_MODE)
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

    public function getTotalPaidSalesForChannel(ChannelInterface $channel): int
    {
        return (int) $this->createQueryBuilder('o')
            ->select('SUM(o.total)')
            ->andWhere('o.channel = :channel')
            ->andWhere('o.paymentState = :state')
            ->andWhere('o.mode != :mode')
            ->setParameter('channel', $channel)
            ->setParameter('state', OrderPaymentStates::STATE_PAID)
            ->setParameter('mode', OrderInterface::PRIMARY_ORDER_MODE)
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    public function getTotalPaidSalesForChannelInPeriod(
        ChannelInterface $channel,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        ): int {
        return (int) $this->createQueryBuilder('o')
            ->select('SUM(o.total)')
            ->andWhere('o.channel = :channel')
            ->andWhere('o.paymentState = :state')
            ->andWhere('o.checkoutCompletedAt >= :startDate')
            ->andWhere('o.checkoutCompletedAt <= :endDate')
            ->andWhere('o.mode != :mode')
            ->setParameter('channel', $channel)
            ->setParameter('state', OrderPaymentStates::STATE_PAID)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->setParameter('mode', OrderInterface::PRIMARY_ORDER_MODE)
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    public function countPaidByChannel(ChannelInterface $channel): int
    {
        return (int) $this->createQueryBuilder('o')
            ->select('COUNT(o.id)')
            ->andWhere('o.channel = :channel')
            ->andWhere('o.paymentState = :state')
            ->andWhere('o.mode != :mode')
            ->setParameter('channel', $channel)
            ->setParameter('state', OrderPaymentStates::STATE_PAID)
            ->setParameter('mode', OrderInterface::PRIMARY_ORDER_MODE)
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    public function countPaidForChannelInPeriod(
        ChannelInterface $channel,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
        ): int {
        return (int) $this->createQueryBuilder('o')
            ->select('COUNT(o.id)')
            ->andWhere('o.channel = :channel')
            ->andWhere('o.paymentState = :state')
            ->andWhere('o.checkoutCompletedAt >= :startDate')
            ->andWhere('o.checkoutCompletedAt <= :endDate')
            ->andWhere('o.mode != :mode')
            ->setParameter('channel', $channel)
            ->setParameter('state', OrderPaymentStates::STATE_PAID)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->setParameter('mode', OrderInterface::PRIMARY_ORDER_MODE)
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    public function findLatestInChannel(int $count, ChannelInterface $channel): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.channel = :channel')
            ->andWhere('o.state != :state')
            ->andWhere('o.mode != :mode')
            ->addOrderBy('o.checkoutCompletedAt', 'DESC')
            ->setParameter('channel', $channel)
            ->setParameter('state', \Sylius\Component\Core\Model\OrderInterface::STATE_CART)
            ->setParameter('mode', OrderInterface::PRIMARY_ORDER_MODE)
            ->setMaxResults($count)
            ->getQuery()
            ->getResult()
            ;
    }

    //  PHPStan warns about no type specified for $customerId argument
    //  As method below overwrites another method, such type addition is not possible
    /** @phpstan-ignore-next-line */
    public function createByCustomerIdQueryBuilder($customerId): QueryBuilder
    {
        return $this->createListQueryBuilder()
            ->andWhere('o.customer = :customerId')
            ->andWhere('o.mode != :mode')
            ->setParameter('customerId', $customerId)
            ->setParameter('mode', OrderInterface::PRIMARY_ORDER_MODE)
            ;
    }

    public function getSettlementDTOForVendorFromDate(VendorInterface $vendor, ?\DateTimeInterface $date): array
    {
        $qb = $this->findAllByVendorQueryBuilder($vendor)
            ->select(
                sprintf(
                    'NEW %s(
                        SUM(o.total),
                        SUM(o.commissionTotal),
                        o.currencyCode,
                        MIN(o.paidAt),
                        MAX(o.paidAt)
                    )',
                    SettlementDTO::class
                )
            )
            ->andWhere('o.mode = :secondaryOrderMode')
            ->setParameter('secondaryOrderMode', OrderInterface::SECONDARY_ORDER_MODE)
            ->groupBy('o.currencyCode');
        if (null === $date) {
            $qb
                ->andWhere('o.paidAt IS NOT NULL');
        } else {
            $qb
                ->andWhere('o.paidAt >= :date')
                ->setParameter('date', $date);
        }

        return $qb->getQuery()
            ->getArrayResult();
    }
}
