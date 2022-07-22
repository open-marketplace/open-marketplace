<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AdjustmentCloner;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Order\Model\AdjustableInterface;

final class AdjustmentClonerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AdjustmentCloner::class);
    }
    
    public function it_clones_adjustment(
        AdjustmentInterface $originalAdjustment,
        AdjustmentInterface $newAdjustment,
        AdjustableInterface $adjustable
    ): void {
        $date = new \DateTime('now');
        $originalAdjustment->getType()->willReturn("type");
        $originalAdjustment->getOriginCode()->willReturn("code");
        $originalAdjustment->isNeutral()->willReturn(false);
        $originalAdjustment->getLabel()->willReturn('label');
        $originalAdjustment->getAdjustable()->willReturn($adjustable);
        $originalAdjustment->getDetails()->willReturn(["details"]);
        $originalAdjustment->getAmount()->willReturn(1);
        $originalAdjustment->getCreatedAt()->willReturn($date);
        $originalAdjustment->getUpdatedAt()->willReturn($date);

        $this->clone($originalAdjustment, $newAdjustment);

        $newAdjustment->setType("type")->shouldHaveBeenCalled();
        $newAdjustment->setOriginCode("code")->shouldHaveBeenCalled();
        $newAdjustment->setNeutral(false)->shouldHaveBeenCalled();
        $newAdjustment->setLabel('label')->shouldHaveBeenCalled();
        $newAdjustment->setAdjustable($adjustable)->shouldHaveBeenCalled();
        $newAdjustment->setDetails(["details"])->shouldHaveBeenCalled();
        $newAdjustment->setAmount(1)->shouldHaveBeenCalled();
        $newAdjustment->setCreatedAt($date)->shouldHaveBeenCalled();
        $newAdjustment->setUpdatedAt($date)->shouldHaveBeenCalled();
    }
}
