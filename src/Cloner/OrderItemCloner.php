<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Sylius\Component\Core\Model\Adjustment;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\OrderItemUnit;

final class OrderItemCloner implements OrderItemClonerInterface
{
    private AdjustmentClonerInterface $cloner;

    private OrderItemUnitCloner $itemUnitCloner;

    public function __construct(AdjustmentClonerInterface $cloner, OrderItemUnitCloner $itemUnitCloner)
    {
        $this->cloner = $cloner;
        $this->itemUnitCloner = $itemUnitCloner;
    }

    public function clone(OrderItemInterface $originalItem, OrderItemInterface $newItem):void
    {
        $newItem->setOriginalUnitPrice($originalItem->getOriginalUnitPrice());
        $newItem->setProductName($originalItem->getProductName());
        $newItem->setVariant($originalItem->getVariant());
        $newItem->setVariantName($originalItem->getVariantName());
        $newItem->setUnitPrice($originalItem->getUnitPrice());
        $newItem->setVersion($originalItem->getVersion());
        $units = $originalItem->getUnits();
        foreach ($units as $unit){
            $newUnit = new OrderItemUnit($newItem);
            $this->itemUnitCloner->clone($unit, $newUnit);
            $newItem->addUnit($newUnit);
        }
        $adjustments = $originalItem->getAdjustments();
        foreach ($adjustments as $adjustment){
            $newAdjustment = new Adjustment();
            $this->cloner->clone($adjustment, $newAdjustment);
            $newItem->addAdjustment($newAdjustment);
        }
    }
}
