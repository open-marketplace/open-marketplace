<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Cloner;

use Sylius\Component\Core\Model\AdjustmentInterface;

final class AdjustmentCloner implements AdjustmentClonerInterface
{
    public function clone(AdjustmentInterface $originalAdjustment, AdjustmentInterface $newAdjustment): void
    {
        $newAdjustment->setType($originalAdjustment->getType());
        $newAdjustment->setOriginCode($originalAdjustment->getOriginCode());
        $newAdjustment->setNeutral($originalAdjustment->isNeutral());
        $newAdjustment->setLabel($originalAdjustment->getLabel());
        $newAdjustment->setAdjustable($originalAdjustment->getAdjustable());
        $newAdjustment->setDetails($originalAdjustment->getDetails());
        $newAdjustment->setAmount($originalAdjustment->getAmount());
        $newAdjustment->setCreatedAt($originalAdjustment->getCreatedAt());
        $newAdjustment->setUpdatedAt($originalAdjustment->getUpdatedAt());
    }
}
