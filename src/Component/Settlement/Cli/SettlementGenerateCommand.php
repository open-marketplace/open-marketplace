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
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
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
        ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Generates settlements for vendors')
            ->addArgument(
                'frequency',
                InputArgument::OPTIONAL,
                'For which frequency should generate settlement(weekly/monthly/quarterly)',
                'weekly'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $frequency = $input->getArgument('frequency');

        if (false === in_array($frequency, VendorInterface::VALID_SETTLEMENT_FREQUENCY, true)) {
            throw new \RuntimeException(
                sprintf(
                    'Frequency "%s" is not valid. Available options are: %s',
                    $frequency,
                    implode(', ', VendorInterface::VALID_SETTLEMENT_FREQUENCY)
                )
            );
        }
        $vendors = $this->vendorRepository->findAllBySettlementFrequency($frequency);
        $channels = $this->channelRepository->findAllEnabled();
        [$nextSettlementStartDate, $nextSettlementEndDate] = $this->getSettlementDateRangeFromFrequency($frequency);

        $persistCount = 0;
        foreach ($vendors as $vendor) {
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
                $this->settlementManager->persist($nextSettlement);
                if (0 === ($persistCount % 50)) {
                    $this->settlementManager->flush();
                }
                ++$persistCount;
            }
        }
        $this->settlementManager->flush();

        return Command::SUCCESS;
    }

    private function getSettlementDateRangeFromFrequency(string $frequency): array
    {
        $startDate = new \DateTime();
        $endDate = new \DateTime();

        return match ($frequency) {
            'weekly' => [
                $startDate->setTimestamp(strtotime('last week monday 00:00:00')),
                $endDate->setTimestamp(strtotime('last week sunday 23:59:59')),
            ],
            'monthly' => [
                $startDate->setTimestamp(strtotime('first day of last month 00:00:00')),
                $endDate->setTimestamp(strtotime('last day of last month 23:59:59')),
            ],
            'quarterly' => [
                $startDate->setTimestamp($this->getLastQuarterStartDate()),
                $endDate->setTimestamp($this->getLastQuarterEndDate()),
            ],
            default => throw new \RuntimeException(sprintf('Invalid frequency "%s" given.', $frequency))
        };
    }

    private function getLastQuarterStartDate(): int
    {
        $month = date('n');
        $countLastQuarterEndMonthAgo = (int) abs(((ceil($month / 3) - 1) * 3) - $month);

        $dateTime = mktime(
            00,
            00,
            00,
            $month - $countLastQuarterEndMonthAgo - 2,
            1,
            (int) date('Y')
        );

        if (false === $dateTime) {
            throw new \RuntimeException('Cannot generate last quarter start date');
        }

        return $dateTime;
    }

    private function getLastQuarterEndDate(): int
    {
        $month = date('n');
        $countLastQuarterEndMonthAgo = (int) abs(((ceil($month / 3) - 1) * 3) - $month);

        $dateTime = mktime(
            23,
            59,
            59,
            $month - $countLastQuarterEndMonthAgo + 1,
            0,
            (int) date('Y')
        );
        if (false === $dateTime) {
            throw new \RuntimeException('Cannot generate last quarter end date');
        }

        return $dateTime;
    }
}
