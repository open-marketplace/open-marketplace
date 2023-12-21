<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Cli;

use BitBag\OpenMarketplace\Component\Channel\Repository\ChannelRepositoryInterface;
use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\AbstractSettlementPeriodResolverStrategy;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\SettlementPeriodResolverInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Sender\SettlementsCreatedEmailSenderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class SettlementGenerateCommand extends Command
{
    public const COMMAND_NAME = 'bitbag:settlement:generate';

    public function __construct(
        private VendorRepositoryInterface $vendorRepository,
        private SettlementRepositoryInterface $settlementRepository,
        private OrderRepositoryInterface $orderRepository,
        private SettlementFactoryInterface $settlementFactory,
        private ObjectManager $settlementManager,
        private ChannelRepositoryInterface $channelRepository,
        private SettlementsCreatedEmailSenderInterface $settlementsCreatedEmailSender,
        private SettlementPeriodResolverInterface $settlementPeriodResolvers,
        ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Generates settlements for vendors');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $vendors = $this->vendorRepository->findAll();
        $channels = $this->channelRepository->findAllEnabled();

        $persistCount = 0;
        /** @var VendorInterface $vendor */
        foreach ($vendors as $vendor) {
            [$nextSettlementStartDate, $nextSettlementEndDate] = $this->settlementPeriodResolvers->getSettlementDateRangeForVendor($vendor);
            $newVendorSettlements = [];

            foreach ($channels as $channel) {
                $lastSettlement = $this->settlementRepository->findLastByVendorAndChannel($vendor, $channel);
                if (
                    null !== $lastSettlement
                    && $lastSettlement->getEndDate() > $nextSettlementStartDate
                ) {
                    continue;
                }

                ['total' => $total, 'commissionTotal' => $commissionTotal] = $this->orderRepository->findForSettlementByVendorAndChannelAndDates(
                    $vendor,
                    $channel,
                    $nextSettlementStartDate,
                    $nextSettlementEndDate
                );
                $nextSettlement = $this->settlementFactory->createNewForVendorAndChannel(
                    $vendor,
                    $channel,
                    (int) $total,
                    (int) $commissionTotal,
                    $nextSettlementStartDate,
                    $nextSettlementEndDate
                );

                $newVendorSettlements[] = $nextSettlement;
                $this->settlementManager->persist($nextSettlement);

                if (0 === ($persistCount % 50)) {
                    $this->settlementManager->flush();
                }
                ++$persistCount;
            }

            $this->settlementsCreatedEmailSender->send($vendor, $newVendorSettlements);
        }
        $this->settlementManager->flush();

        return Command::SUCCESS;
    }
}
