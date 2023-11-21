<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Cli;

use BitBag\OpenMarketplace\Component\Order\Repository\OrderRepositoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\SettlementFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\SettlementRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepositoryInterface;
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
        ) {
        parent::__construct(self::COMMAND_NAME);
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Generates settlements for vendors')
            ->addArgument(
                'vendors',
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
                'Vendor ids separated by spaces(optional)'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $vendorIds = $input->getArgument('vendors');
        if (false === empty($vendorIds)) {
            $vendors = $this->vendorRepository->findBy(['id' => $vendorIds]);
        } else {
            $vendors = $this->vendorRepository->findAll();
        }

        /** @var VendorInterface $vendor */
        foreach ($vendors as $vendor) {
            $settlement = $this->settlementRepository->findLastByVendor($vendor);

            if (false === $this->shouldGenerateSettlementForVendor($settlement, $vendor)) {
                continue;
            }

            $settlementDTO = $this->orderRepository->getSettlementDTOForVendorFromDate($vendor, $settlement?->getEndDate());

            if (null === $settlementDTO) {
                continue;
            }
            $newSettlement = $this->settlementFactory->createNewFromDTOAndVendor($settlementDTO, $vendor);

            $this->settlementRepository->add($newSettlement);
        }

        return Command::SUCCESS;
    }

    private function shouldGenerateSettlementForVendor(?SettlementInterface $settlement, VendorInterface $vendor): bool
    {
        if (null === $settlement) {
            return true;
        }

        return $settlement->getEndDate()->diff(new \DateTime())->d >= $vendor->getSettlementFrequency();
    }
}
