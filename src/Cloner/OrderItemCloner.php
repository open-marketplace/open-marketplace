<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\Adjustment;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\OrderItemUnit;
use Sylius\Component\Core\Model\ShipmentInterface;

final class OrderItemCloner implements OrderItemClonerInterface
{
    private AdjustmentClonerInterface $cloner;

    private OrderItemUnitCloner $itemUnitCloner;

    private EntityManagerInterface $entityManager;

    public function __construct(
        AdjustmentClonerInterface $cloner,
        OrderItemUnitCloner $itemUnitCloner,
        EntityManagerInterface $entityManager
    ) {
        $this->cloner = $cloner;
        $this->itemUnitCloner = $itemUnitCloner;
        $this->entityManager = $entityManager;
    }

    public function clone(OrderItemInterface $originalItem, OrderItemInterface $newItem, ShipmentInterface $shipment):void
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
            $newUnit->setShipment($shipment);
            $newItem->addUnit($newUnit);
        }
        $adjustments = $originalItem->getAdjustments();
        foreach ($adjustments as $adjustment){
            $newAdjustment = new Adjustment();
            $this->cloner->clone($adjustment, $newAdjustment);
            $this->entityManager->persist($newAdjustment);
            $newItem->addAdjustment($newAdjustment);
        }
    }
}
