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
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\ShipmentInterface;
use Sylius\Component\Core\Model\ShippingMethod;

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
        ShippingMethod $shippingMethod,
        AdjustmentInterface $adjustment
    ): void
    {
        $adjustmentCollection = new ArrayCollection([$adjustment->getWrappedObject()]);
        $date = new \DateTime('now');

        $originalShipment->getState()->willReturn('new');
        $originalShipment->getUpdatedAt()->willReturn($date);
        $originalShipment->getCreatedAt()->willReturn($date);
        $originalShipment->getMethod()->willReturn($shippingMethod);
        $originalShipment->getAdjustments()->willReturn($adjustmentCollection);

        $newShipment->setState($originalShipment->getState());
        $newShipment->setUpdatedAt($originalShipment->getUpdatedAt());
        $newShipment->setCreatedAt($originalShipment->getCreatedAt());
        $newShipment->setMethod($originalShipment->getMethod());
        $adjustments = $originalShipment->getAdjustments();
    }
}
