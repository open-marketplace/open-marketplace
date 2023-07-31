<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Order\CommissionCalculator;

use BitBag\OpenMarketplace\Component\Order\CommissionCalculator\VendorCommissionCalculatorInterface;
use BitBag\OpenMarketplace\Component\Order\CommissionCalculator\VendorGrossCommissionCalculator;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

class VendorGrossCommissionCalculatorSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorGrossCommissionCalculator::class);
        $this->shouldImplement(VendorCommissionCalculatorInterface::class);
    }

    public function it_returns_false_on_unsupported_commission_type(OrderInterface $order, VendorInterface $vendor): void
    {
        $order->getVendor()->willReturn($vendor);
        $vendor->getCommissionType()->willReturn('net');
        $this->supports($order)->shouldReturn(false);
    }

    public function it_throws_exception_on_primary_order(OrderInterface $order): void
    {
        $order->isPrimary()->willReturn(true);
        $this->shouldThrow(\Exception::class)
            ->during('calculate', [$order]);
    }

    public function it_calculates_valid_commission(OrderInterface $order, VendorInterface $vendor): void
    {
        $order->isPrimary()->willReturn(false);
        $order->getVendor()->willReturn($vendor);
        $vendor->getCommission()->willReturn(10);
        $order->getTotal()->willReturn(10000);
        $this->calculate($order)->shouldReturn(1000);
    }
}
