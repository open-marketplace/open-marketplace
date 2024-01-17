<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\Creator;

use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Creator\SettlementCreator;
use BitBag\OpenMarketplace\Component\Settlement\Creator\SettlementCreatorInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\SettlementPeriodResolverInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;

final class SettlementCreatorSpec extends ObjectBehavior
{
    public function let(
        SettlementRepositoryInterface $settlementRepository,
        OrderRepositoryInterface $orderRepository,
        SettlementFactoryInterface $settlementFactory,
        EntityManagerInterface $settlementManager,
        SettlementPeriodResolverInterface $settlementPeriodResolver,
        ): void {
        $this->beConstructedWith(
            $settlementRepository,
            $orderRepository,
            $settlementFactory,
            $settlementManager,
            $settlementPeriodResolver
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SettlementCreator::class);
    }

    public function it_implements_settlement_creator_interface(): void
    {
        $this->shouldImplement(SettlementCreatorInterface::class);
    }

    public function it_creates_settlements_for_vendor_and_channels(
        VendorInterface $vendor,
        ChannelInterface $channelA,
        ChannelInterface $channelB,
        SettlementInterface $settlementB,
        SettlementInterface $lastSettlementA,
        SettlementRepositoryInterface $settlementRepository,
        OrderRepositoryInterface $orderRepository,
        SettlementFactoryInterface $settlementFactory,
        EntityManagerInterface $settlementManager,
        SettlementPeriodResolverInterface $settlementPeriodResolver,
        ): void {
        $from = new \DateTime('2021-01-01');
        $to = new \DateTime('2021-01-31');
        $lastSettlementAEndDate = new \DateTime('2021-01-15');
        $lastSettlementBEndAt = null;
        $totalB = 9481;
        $totalCommissionB = 243;

        $channels = [$channelA, $channelB];

        $vendor->hasCyclicalSettlementFrequency()->willReturn(true);

        $settlementRepository->findLastByVendorAndChannel(
            $vendor,
            $channelA,
        )->willReturn($lastSettlementA);

        $lastSettlementA->getEndDate()->willReturn($lastSettlementAEndDate);

        $settlementPeriodResolver->getSettlementDateRangeForVendor(
            $vendor,
            true,
            $lastSettlementAEndDate
        )->willReturn([$from, $to]);

        $orderRepository->findForSettlementByVendorAndChannelAndDates(
            $vendor,
            $channelA,
            $from,
            $to
        )->shouldNotBeCalled();

        $settlementRepository->findLastByVendorAndChannel(
            $vendor,
            $channelB
        )->willReturn(null);

        $settlementPeriodResolver->getSettlementDateRangeForVendor(
            $vendor,
            true,
            $lastSettlementBEndAt
        )->willReturn([$from, $to]);

        $orderRepository->findForSettlementByVendorAndChannelAndDates(
            $vendor,
            $channelB,
            $from,
            $to
        )->willReturn([
            'total' => $totalB,
            'commissionTotal' => $totalCommissionB,
        ]);

        $settlementFactory->createNewForVendorAndChannel(
            $vendor,
            $channelB,
            $totalB,
            $totalCommissionB,
            $from,
            $to
        )->willReturn($settlementB);

        $settlementManager->persist($settlementB)->shouldBeCalled();

        $this->createSettlementsForVendorAndChannels(
            $vendor,
            $channels
        )->shouldBeLike([
            $settlementB,
        ]);
    }

    public function it_creates_settlement_for_vendor_and_channel_and_amount(
        VendorInterface $vendor,
        ChannelInterface $channel,
        SettlementInterface $settlement,
        SettlementInterface $lastSettlement,
        SettlementRepositoryInterface $settlementRepository,
        SettlementFactoryInterface $settlementFactory,
        EntityManagerInterface $settlementManager,
        SettlementPeriodResolverInterface $settlementPeriodResolver,
        ): void {
        $from = new \DateTime('2021-01-01');
        $to = new \DateTime('2021-01-31');
        $lastSettlementEndDate = new \DateTime('2020-12-29');
        $amount = 9481;

        $vendor->hasCyclicalSettlementFrequency()->willReturn(false);

        $settlementRepository->findLastByVendorAndChannel(
            $vendor,
            $channel,
        )->willReturn($lastSettlement);

        $lastSettlement->getEndDate()->willReturn($lastSettlementEndDate);

        $settlementPeriodResolver->getSettlementDateRangeForVendor(
            $vendor,
            false,
            $lastSettlementEndDate
        )->willReturn([$from, $to]);

        $settlementFactory->createNewForVendorAndChannel(
            $vendor,
            $channel,
            $amount,
            0,
            $from,
            $to
        )->willReturn($settlement);

        $settlementManager->persist($settlement)->shouldBeCalled();

        $this->createSettlementForVendorAndChannelAndAmount(
            $vendor,
            $channel,
            $amount
        )->shouldBeLike(
            $settlement,
        );
    }
}
