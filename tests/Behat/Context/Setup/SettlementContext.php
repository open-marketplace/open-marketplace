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
}
