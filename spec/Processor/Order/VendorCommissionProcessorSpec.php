<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Processor\Order;

use BitBag\OpenMarketplace\Calculator\VendorCommissionCalculatorInterface;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Processor\Order\VendorCommissionProcessor;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

final class VendorCommissionProcessorSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        \IteratorAggregate $calculators
    ): void {
        $this->beConstructedWith(
            $calculators,
            $entityManager,
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorCommissionProcessor::class);
    }

    public function it_calculates_the_commission(
        \IteratorAggregate $calculators,
        VendorCommissionCalculatorInterface $commissionCalculator,
        OrderInterface $order
    ): void {
        $commissionCalculator->supports($order)->willReturn(true);
        $commissionCalculator->calculate($order)->willReturn(100);
        $calculators->getIterator()->willReturn(new ArrayCollection([$commissionCalculator->getWrappedObject()]));

        $this->process($order);

        $order->setCommissionTotal(100)->shouldHaveBeenCalled();
    }
}
