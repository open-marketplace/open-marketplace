<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Provider;

use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\SettlementPeriodResolverInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Model\ChannelInterface;

final class SettlementProvider implements SettlementProviderInterface
{
    public function __construct(
        private SettlementRepositoryInterface $settlementRepository,
        private OrderRepositoryInterface $orderRepository,
        private SettlementFactoryInterface $settlementFactory,
        private ObjectManager $settlementManager,
        private SettlementPeriodResolverInterface $settlementPeriodResolver,
        ) {
    }

    public function provideSettlementForVendorAndChannels(
        VendorInterface $vendor,
        array $channels,
        bool $flush = true
    ): array {
        [$nextSettlementStartDate, $nextSettlementEndDate] = $this->settlementPeriodResolver->getSettlementDateRangeForVendor($vendor);

        $generatedSettlements = [];

        /** @var ChannelInterface $channel */
        foreach ($channels as $channel) {
            $settlement = $this->provideSettlementForVendorAndChannel(
                $vendor,
                $channel,
                $nextSettlementStartDate,
                $nextSettlementEndDate
            );

            if (!$settlement instanceof SettlementInterface) {
                continue;
            }

            $this->settlementManager->persist($settlement);

            $generatedSettlements[] = $settlement;
        }

        if ($flush) {
            $this->settlementManager->flush();
        }

        return $generatedSettlements;
    }

    private function provideSettlementForVendorAndChannel(
        VendorInterface $vendor,
        ChannelInterface $channel,
        \DateTime $nextSettlementStartDate,
        \DateTime $nextSettlementEndDate
    ): ?SettlementInterface {
        $lastSettlement = $this->settlementRepository->findLastByVendorAndChannel($vendor, $channel);
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
