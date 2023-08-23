<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Order\Cloner;

use BitBag\OpenMarketplace\Component\Order\Cloner\AdjustmentClonerInterface;
use BitBag\OpenMarketplace\Component\Order\Cloner\OrderItemCloner;
use BitBag\OpenMarketplace\Component\Order\Cloner\OrderItemUnitClonerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Core\Model\OrderItemUnitInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Core\Model\ShipmentInterface;

final class OrderItemClonerSpec extends ObjectBehavior
{
    public function let(
        AdjustmentClonerInterface $cloner,
        OrderItemUnitClonerInterface $itemUnitCloner,
        EntityManagerInterface $entityManager,
        ): void {
        $this->beConstructedWith($cloner, $itemUnitCloner, $entityManager);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(OrderItemCloner::class);
    }

    public function it_clones_order_item(
        AdjustmentClonerInterface $cloner,
        OrderItemUnitClonerInterface $itemUnitCloner,
        EntityManagerInterface $entityManager,
        OrderItemInterface $originalItem,
        OrderItemInterface $newItem,
        ProductVariantInterface $productVariant,
        ShipmentInterface $shipment,
        OrderItemUnitInterface $unit,
        AdjustmentInterface $adjustment,
        ): void {
        $unitCollection = new ArrayCollection([$unit->getWrappedObject()]);
        $adjustmentCollection = new ArrayCollection([$adjustment->getWrappedObject()]);

        $originalItem->getUnits()->willReturn($unitCollection);
        $originalItem->getAdjustments()->willReturn($adjustmentCollection);

        $originalItem->getOriginalUnitPrice()->willReturn(111);
        $originalItem->getProductName()->willReturn('name');
        $originalItem->getVariant()->willReturn($productVariant);
        $originalItem->getVariantName()->willReturn('variant_name');
        $originalItem->getUnitPrice()->willReturn(111);
        $originalItem->getVersion()->willReturn(1);

        $this->clone($originalItem, $newItem, $shipment);

        $newItem->setOriginalUnitPrice(111);
        $newItem->setProductName('name');
        $newItem->setVariant($productVariant);
        $newItem->setVariantName('variant_name');
        $newItem->setUnitPrice(111);
        $newItem->setVersion(1);
    }
}
