<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Processor\Order;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use Doctrine\ORM\EntityManagerInterface;

final class VendorCommissionProcessor implements VendorCommissionProcessorInterface
{
    private iterable $commissionCalculators;

    private EntityManagerInterface $entityManager;

    public function __construct(iterable $commissionCalculators, EntityManagerInterface $entityManager)
    {
        $this->commissionCalculators = $commissionCalculators;
        $this->entityManager = $entityManager;
    }

    public function process(OrderInterface $order): void
    {
        $commission = $this->calculateCommission($order);
        $order->setCommissionTotal($commission);
        $this->entityManager->persist($order);
    }

    private function calculateCommission(OrderInterface $order): int
    {
        foreach ($this->commissionCalculators as $commissionCalculator) {
            if ($commissionCalculator->supports($order)) {
                return $commissionCalculator->calculate($order);
            }
        }

        throw new \RuntimeException('No commission calculator found for order');
    }
}
