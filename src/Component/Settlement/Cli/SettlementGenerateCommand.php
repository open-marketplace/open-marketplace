<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Cli;

use BitBag\OpenMarketplace\Component\Settlement\Creator\SettlementCreatorInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\ChannelRepositoryInterface;
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
        private ChannelRepositoryInterface $channelRepository,
        private SettlementCreatorInterface $settlementCreator,
        private ObjectManager $settlementManager,
        private SettlementsCreatedEmailSenderInterface $settlementsCreatedEmailSender,
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
            $newSettlements = $this->settlementCreator->createSettlementsForAutoGeneration(
                $vendor,
                $channels,
            );

            if (0 === count($newSettlements)) {
                continue;
            }

            if (0 === ($persistCount % 50)) {
                $this->settlementManager->flush();
            }
            $persistCount += count($newSettlements);

            $this->settlementsCreatedEmailSender->send($vendor, $newSettlements);
        }

        $this->settlementManager->flush();

        return Command::SUCCESS;
    }
}
