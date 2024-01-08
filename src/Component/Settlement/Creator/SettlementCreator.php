<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Creator;

use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\SettlementPeriodResolverInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Model\ChannelInterface;

final class SettlementCreator implements SettlementCreatorInterface
{
    public function __construct(
        private SettlementRepositoryInterface $settlementRepository,
        private OrderRepositoryInterface $orderRepository,
        private SettlementFactoryInterface $settlementFactory,
        private ObjectManager $settlementManager,
        private SettlementPeriodResolverInterface $settlementPeriodResolver,
        ) {
    }

    public function createSettlementsForVendorAndChannels(
        VendorInterface $vendor,
        array $channels
    ): array {
        $cyclical = true;
        $generatedSettlements = [];

        /** @var ChannelInterface $channel */
        foreach ($channels as $channel) {
            $settlement = $this->createSettlementForVendorAndChannelIfNotExists(
                $vendor,
                $channel,
                $cyclical
            );

            if (!$settlement instanceof SettlementInterface) {
                continue;
            }

            $this->settlementManager->persist($settlement);

            $generatedSettlements[] = $settlement;
        }

        return $generatedSettlements;
    }

    public function createSettlementForVendorAndChannelAndAmount(
        VendorInterface $vendor,
        ChannelInterface $channel,
        int $amount,
        ): SettlementInterface {
        $lastSettlement = $this->settlementRepository->findLastByVendorAndChannel($vendor, $channel);
        $cyclical = false;

        [$nextSettlementStartDate, $nextSettlementEndDate] = $this->settlementPeriodResolver->getSettlementDateRangeForVendor(
            $vendor,
            $cyclical,
            !$lastSettlement ? null : $lastSettlement->getEndDate()
        );

        $settlement = $this->settlementFactory->createNewForVendorAndChannel(
            $vendor,
            $channel,
            $amount,
            0,
            $nextSettlementStartDate,
            $nextSettlementEndDate
        );

        $this->settlementManager->persist($settlement);

        return $settlement;
    }

    private function createSettlementForVendorAndChannelIfNotExists(
        VendorInterface $vendor,
        ChannelInterface $channel,
        bool $cyclical = true
    ): ?SettlementInterface {
        $lastSettlement = $this->settlementRepository->findLastByVendorAndChannel($vendor, $channel);

        [$nextSettlementStartDate, $nextSettlementEndDate] = $this->settlementPeriodResolver->getSettlementDateRangeForVendor(
            $vendor,
            $cyclical,
            !$lastSettlement ? null : $lastSettlement->getEndDate()
        );

        if (
            null !== $lastSettlement
            && $lastSettlement->getEndDate() > $nextSettlementStartDate
        ) {
            return null;
        }

        [
            'total' => $total,
            'commissionTotal' => $commissionTotal
        ] = $this->orderRepository->findForSettlementByVendorAndChannelAndDates(
            $vendor,
            $channel,
            $nextSettlementStartDate,
            $nextSettlementEndDate
        );

        return $this->settlementFactory->createNewForVendorAndChannel(
            $vendor,
            $channel,
            (int) $total,
            (int) $commissionTotal,
            $nextSettlementStartDate,
            $nextSettlementEndDate
        );
    }
}
