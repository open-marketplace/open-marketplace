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
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Repository\OrderRepositoryInterface as BaseOrderRepositoryInterface;

interface OrderRepositoryInterface extends BaseOrderRepositoryInterface
{
    public function findAllByVendorQueryBuilder(VendorInterface $vendor): QueryBuilder;

    public function findAllSecondaryOrders(): QueryBuilder;

    public function findOrderForVendor(VendorInterface $vendor, string $id): ?OrderInterface;

    public function findOrdersForVendorByCustomer(VendorInterface $vendor, string $id): QueryBuilder;

    public function createByCustomerAndChannelIdAndSecondaryQueryBuilder(int $customerId, int $channelId): QueryBuilder;

    public function getTotalPaidSalesForChannel(ChannelInterface $channel): int;

    public function getTotalPaidSalesForChannelInPeriod(
        ChannelInterface $channel,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate
    ): int;

    public function countPaidByChannel(ChannelInterface $channel): int;

    public function countPaidForChannelInPeriod(
        ChannelInterface $channel,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate
    ): int;

    public function findLatestInChannel(int $count, ChannelInterface $channel): array;

    /** @phpstan-ignore-next-line */
    public function createByCustomerIdQueryBuilder($customerId): QueryBuilder;

    public function findForSettlementByVendorAndChannelAndDates(
        VendorInterface $vendor,
        ChannelInterface $channel,
        \DateTimeInterface $nextSettlementStartDate,
        \DateTimeInterface $nextSettlementEndDate
    ): array;
}
