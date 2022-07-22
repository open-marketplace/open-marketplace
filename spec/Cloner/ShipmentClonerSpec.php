<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AdjustmentClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ShipmentCloner;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\ShipmentInterface;
use Sylius\Component\Core\Model\ShippingMethodInterface;

final class ShipmentClonerSpec extends ObjectBehavior
{
    public function let(AdjustmentClonerInterface $adjustmentCloner): void
    {
        $this->beConstructedWith($adjustmentCloner);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShipmentCloner::class);
    }

    public function it_clones_shipment(
        ShipmentInterface $originalShipment,
        ShipmentInterface $newShipment,
        ShippingMethodInterface $shippingMethod,
        AdjustmentInterface $adjustment,
        AdjustmentClonerInterface $adjustmentCloner
    ): void {
        $adjustmentCollection = new ArrayCollection([$adjustment->getWrappedObject(), $adjustment->getWrappedObject()]);
        $date = new \DateTime('now');

        $originalShipment->getState()->willReturn('new');
        $originalShipment->getUpdatedAt()->willReturn($date);
        $originalShipment->getCreatedAt()->willReturn($date);
        $originalShipment->getMethod()->willReturn($shippingMethod);
        $originalShipment->getAdjustments()->willReturn($adjustmentCollection);

        $this->clone($originalShipment, $newShipment);

        $newShipment->setState('new')->shouldHaveBeenCalledTimes(1);
        $newShipment->setUpdatedAt($date)->shouldHaveBeenCalledTimes(1);
        $newShipment->setCreatedAt($date)->shouldHaveBeenCalledTimes(1);
        $newShipment->setMethod($shippingMethod)->shouldHaveBeenCalledTimes(1);

        $adjustmentsCount = $adjustmentCollection->count();
        $adjustmentCloner->clone($adjustment, Argument::any())->shouldHaveBeenCalledTimes($adjustmentsCount);
    }
}
