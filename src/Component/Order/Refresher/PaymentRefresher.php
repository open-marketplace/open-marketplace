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
use Sylius\Component\Core\Model\PaymentInterface;

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

        $this->refreshPaymentMethodAndAmount($secondaryOrder);

        $this->entityManager->persist($secondaryOrder);
    }

    private function refreshPaymentMethodAndAmount(OrderInterface $secondaryOrder): void
    {
        $secondaryOrderPayment = $secondaryOrder->getLastPayment();
        if (!$secondaryOrderPayment instanceof PaymentInterface) {
            return;
        }

        $secondaryOrderPayment->setAmount($secondaryOrder->getTotal());

        $primaryOrder = $secondaryOrder->getPrimaryOrder();

        if (!$primaryOrder instanceof OrderInterface) {
            return;
        }

        $primaryOrderPayment = $primaryOrder->getLastPayment();

        if (!$primaryOrderPayment instanceof PaymentInterface) {
            return;
        }

        $secondaryOrderPayment->setMethod($primaryOrderPayment->getMethod());
    }
}
