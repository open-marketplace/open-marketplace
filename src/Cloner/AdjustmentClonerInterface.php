<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Sylius\Component\Order\Model\AdjustmentInterface;

interface AdjustmentClonerInterface
{
    public function clone(AdjustmentInterface $originalAdjustment, AdjustmentInterface $newAdjustment): void;
}
