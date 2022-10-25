<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Cloner;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\Adjustment;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\OrderItemUnitInterface;

final class OrderItemUnitCloner implements OrderItemUnitClonerInterface
{
    private AdjustmentClonerInterface $cloner;

    private EntityManagerInterface $entityManager;

    public function __construct(
        AdjustmentClonerInterface $cloner,
        EntityManagerInterface $entityManager
    ) {
        $this->cloner = $cloner;
        $this->entityManager = $entityManager;
    }

    public function clone(OrderItemUnitInterface $originalUnit, OrderItemUnitInterface $newUnit): void
    {
        $newUnit->setUpdatedAt($originalUnit->getUpdatedAt());
        $newUnit->setCreatedAt($originalUnit->getCreatedAt());

        $adjustments = $originalUnit->getAdjustments();

        /** @var AdjustmentInterface $adjustment */
        foreach ($adjustments as $adjustment) {
            $newAdjustment = new Adjustment();
            $this->cloner->clone($adjustment, $newAdjustment);
            $newUnit->addAdjustment($newAdjustment);

            $this->entityManager->persist($newAdjustment);
        }
    }
}
