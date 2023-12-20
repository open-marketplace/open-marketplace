<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory\SettlementExampleFactory;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Formatter\StringInflector;

final class SettlementContext implements Context
{
    public function __construct(
        private SettlementExampleFactory $settlementExampleFactory,
        private SharedStorageInterface $sharedStorage,
        private EntityManagerInterface $entityManager,
        ) {
    }

    /**
     * @Given there is a :status settlement with total amount of :totalAmount and commission amount of :commissionTotalAmount
     * @Given there is a :status settlement
     */
    public function thereIsASettlementWithTotalAmountOfAndCommissionAmountOf(
        string $status,
        float $totalAmount = 0,
        float $commissionTotalAmount = 0,
        ): void {
        $vendor = $this->sharedStorage->get('vendor');

        $settlement = $this->settlementExampleFactory->create([
            'status' => $status,
            'totalAmount' => (int) floor($totalAmount * 100),
            'totalCommissionAmount' => (int) floor($commissionTotalAmount * 100),
            'vendor' => $vendor,
        ]);

        $this->entityManager->persist($settlement);
        $this->entityManager->flush();
    }

    /**
     * @Given there is a settlement with period from :from to :to
     */
    public function thereIsASettlementWithPeriodFromTo(
        string $from,
        string $to,
    ): void {
        $vendor = $this->sharedStorage->get('vendor');

        $settlement = $this->settlementExampleFactory->create([
            'vendor' => $vendor,
            'startDate' => \DateTime::createFromFormat('d/m/Y H:i:s', sprintf('%s 00:00:00', $from)),
            'endDate' => \DateTime::createFromFormat('d/m/Y H:i:s', sprintf('%s 23:59:59', $to)),
        ]);

        $this->entityManager->persist($settlement);
        $this->entityManager->flush();
    }

    /**
     * @Given there is a :status settlement for vendor :vendorEmail
     */
    public function thereIsASettlementForVendor(
        string $status,
        string $vendorEmail,
    ): void {
        $settlement = $this->settlementExampleFactory->create([
            'status' => $status,
            'vendor' => $vendorEmail,
        ]);

        $this->entityManager->persist($settlement);
        $this->entityManager->flush();
    }

    /**
     * @Given there is a settlement for channel :channelName
     */
    public function thereIsASettlementForChannel(string $channelName): void
    {
        $vendor = $this->sharedStorage->get('vendor');

        $settlement = $this->settlementExampleFactory->create([
            'vendor' => $vendor,
            'channel' => StringInflector::nameToLowercaseCode($channelName),
        ]);

        $this->entityManager->persist($settlement);
        $this->entityManager->flush();
    }
}
