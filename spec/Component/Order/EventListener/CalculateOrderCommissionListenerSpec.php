<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Order\EventListener;

use BitBag\OpenMarketplace\Component\Order\CommissionCalculator\VendorCommissionCalculatorInterface;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Order\Event\PostSplitOrderEvent;
use BitBag\OpenMarketplace\Component\Order\EventListener\CalculateOrderCommissionListener;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

class CalculateOrderCommissionListenerSpec extends ObjectBehavior
{
    public function let(
        \IteratorAggregate $commissionCalculators,
        EntityManagerInterface $entityManager
    ): void {
        $this->beConstructedWith(
            $commissionCalculators,
            $entityManager
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CalculateOrderCommissionListener::class);
    }

    public function it_throws_exception_about_lack_of_calculator(
        \IteratorAggregate $commissionCalculators,
        PostSplitOrderEvent $event,
        OrderInterface $order
    ): void {
        $commissionCalculators->getIterator()->willReturn(new ArrayCollection([]));
        $event->getOrders()->willReturn([$order]);
        $this->shouldThrow(\RuntimeException::class)->during('calculate', [$event]);
    }

    public function it_calculates_commission(
        \IteratorAggregate $commissionCalculators,
        PostSplitOrderEvent $event,
        OrderInterface $order,
        VendorCommissionCalculatorInterface $commissionCalculator
    ): void {
        $commissionCalculators->getIterator()->willReturn(new ArrayCollection([$commissionCalculator->getWrappedObject()]));
        $event->getOrders()->willReturn([$order]);
        $commissionCalculator->supports($order)->willReturn(true);
        $commissionCalculator->calculate($order)->willReturn(1000);
        $order->setCommissionTotal(1000)->shouldBeCalled();
        $this->calculate($event);
    }
}
