<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\EventListener;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Event\Order\PostSplitOrderEvent;
use Doctrine\ORM\EntityManagerInterface;

class CalculateOrderCommissionListener
{
    private iterable $commissionCalculators;

    private EntityManagerInterface $entityManager;

    public function __construct(iterable $commissionCalculators, EntityManagerInterface $entityManager)
    {
        $this->commissionCalculators = $commissionCalculators;
        $this->entityManager = $entityManager;
    }

    public function calculate(PostSplitOrderEvent $event): void
    {
        foreach ($event->getOrders() as $order) {
            $commission = $this->calculateCommission($order);
            $order->setCommissionTotal($commission);
            $this->entityManager->persist($order);
        }
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
