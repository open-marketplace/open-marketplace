<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Sylius\Component\Core\Model\OrderItemUnitInterface;
use Sylius\Component\Order\Model\Adjustment;

final class OrderItemUnitCloner
{
    private AdjustmentClonerInterface $cloner;

    public function __construct(AdjustmentClonerInterface $cloner)
    {
        $this->cloner = $cloner;
    }

    public function clone(OrderItemUnitInterface $originalUnit, OrderItemUnitInterface $newUnit): void
    {
        $newUnit->setUpdatedAt($originalUnit->getUpdatedAt());
        $newUnit->setCreatedAt($originalUnit->getCreatedAt());

        $adjustments = $originalUnit->getAdjustments();
        foreach ($adjustments as $adjustment){
            $newAdjustment = new Adjustment();
            $this->cloner->clone($adjustment, $newAdjustment);
            $newUnit->addAdjustment($newAdjustment);
        }
    }
}
