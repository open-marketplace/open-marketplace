<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\Refresher;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use Doctrine\ORM\EntityManager;

final class PaymentRefresher implements PaymentRefresherInterface
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function refreshPayment(OrderInterface $secondaryOrder): void
    {
        $secondaryOrder->recalculateItemsTotal();
        $secondaryOrder->recalculateAdjustmentsTotal();
        $payment = $secondaryOrder->getPayments()[0];
        if ($payment) {
            $payment->setAmount($secondaryOrder->getTotal());
            $this->entityManager->persist($payment);
        }
    }
}
