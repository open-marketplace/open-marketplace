<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Creator;

use BitBag\OpenMarketplace\Component\Channel\Repository\ChannelRepositoryInterface;
use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Manager\VirtualWalletManagerInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\VirtualWalletRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Sylius\Component\Core\Model\ChannelInterface;

final class CompensatorySettlementsCreator implements CompensatorySettlementsCreatorInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private SettlementRepositoryInterface $settlementRepository,
        private ChannelRepositoryInterface $channelRepository,
        private OrderRepositoryInterface $orderRepository,
        private SettlementFactoryInterface $settlementFactory,
        private VirtualWalletRepositoryInterface $virtualWalletRepository,
        private VirtualWalletManagerInterface $virtualWalletManager,
        ) {
    }

    public function createCompensatorySettlements(
        VendorInterface $vendor,
        PostUpdateEventArgs $eventArgs,
        string $previousFrequency,
        ): array {
        $settlements = in_array($previousFrequency, VendorSettlementFrequency::CYCLICAL_SETTLEMENT_FREQUENCIES, true)
            ? $this->createCyclicalSettlements($vendor)
            : $this->createNonCyclicalSettlements($vendor, $eventArgs)
        ;

        $this->entityManager->flush();

        return $settlements;
    }

    private function createNonCyclicalSettlements(VendorInterface $vendor, PostUpdateEventArgs $eventArgs): array
    {
        $settlements = [];
        $virtualWallets = $this->virtualWalletRepository->findAllByVendorWithPositiveBalance($vendor);

        /** @var VirtualWalletInterface $virtualWallet */
        foreach ($virtualWallets as $virtualWallet) {
            $lastSettlement = $this->settlementRepository->findLastByVendorAndChannel($vendor, $virtualWallet->getChannel());

            $compensatorySettlementFrom = $lastSettlement
                ? (\DateTime::createFromInterface($lastSettlement->getEndDate()))->modify('+ 1 second')
                : $vendor->getCreatedAt()
            ;

            $compensatorySettlementTo = new \DateTime();

            $total = $virtualWallet->getBalance();
            $settlement = $this->settlementFactory->createNewForVendorAndChannel(
                $vendor,
                $virtualWallet->getChannel(),
                $total,
                0,
                $compensatorySettlementFrom,
                $compensatorySettlementTo,
            );

            $this->entityManager->persist($settlement);

            $this->virtualWalletManager->withdraw($settlement, $eventArgs);

            $settlements[] = $settlement;
        }

        return $settlements;
    }

    private function createCyclicalSettlements(VendorInterface $vendor): array
    {
        $channels = $this->channelRepository->findAll();
        $settlements = [];

        /** @var ChannelInterface $channel */
        foreach ($channels as $channel) {
            $lastSettlement = $this->settlementRepository->findLastByVendorAndChannel($vendor, $channel);

            $compensatorySettlementFrom = $lastSettlement
                ? (\DateTime::createFromInterface($lastSettlement->getEndDate()))->modify('+ 1 second')
                : $vendor->getCreatedAt()
            ;

            $compensatorySettlementTo = new \DateTime();

            [
                'total' => $total,
                'commissionTotal' => $commissionTotal
            ] = $this->orderRepository->findForSettlementByVendorAndChannelAndDates(
                $vendor,
                $channel,
                $compensatorySettlementFrom,
                $compensatorySettlementTo,
            );

            if (0 === (int) $total && 0 === (int) $commissionTotal) {
                continue;
            }

            $settlement = $this->settlementFactory->createNewForVendorAndChannel(
                $vendor,
                $channel,
                (int) $total,
                (int) $commissionTotal,
                $compensatorySettlementFrom,
                $compensatorySettlementTo,
            );

            $this->entityManager->persist($settlement);
            $settlements[] = $settlement;
        }

        return $settlements;
    }
}
