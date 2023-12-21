<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\AbstractSettlementPeriodResolverStrategy;
use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\SettlementPeriodResolver;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class SettlementPeriodResolverSpec extends ObjectBehavior
{
    public function let(
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
    ): void {
        $this->beConstructedWith([
            $resolverA,
            $resolverB,
        ]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SettlementPeriodResolver::class);
    }

    public function it_should_throw_exception_when_no_resolver_supports_vendor(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
        ): void {
        $cyclical = true;
        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);

        $resolverA->supports($vendor, $cyclical)->willReturn(false);
        $resolverB->supports($vendor, $cyclical)->willReturn(false);

        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('getSettlementDateRangeForVendor', [$vendor->getWrappedObject(), null, $cyclical]);
    }

    public function it_should_call_only_one_resolver(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
        ): void {
        $cyclical = true;

        $from = new \DateTime('-1 month');
        $to = new \DateTime();

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);
        $vendor->getCreatedAt()->willReturn($from);

        $resolverA->supports($vendor, $cyclical)->willReturn(true);
        $resolverA->resolve($from)->willReturn([$from, $to]);
        $resolverB->supports($vendor, $cyclical)->shouldNotBeCalled();
        $resolverB->resolve(null)->shouldNotBeCalled();

        $this->getSettlementDateRangeForVendor($vendor, null, $cyclical)->shouldBeLike([$from, $to]);
    }

    public function it_should_only_call_second_one_resolver(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
        ): void {
        $cyclical = true;

        $from = new \DateTime('-1 month');
        $to = new \DateTime();

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);
        $vendor->getCreatedAt()->willReturn($from);

        $resolverB->supports($vendor, $cyclical)->willReturn(true);
        $resolverB->resolve($from)->willReturn([$from, $to]);
        $resolverA->supports($vendor, $cyclical)->willReturn(false);

        $resolverA->resolve(null)->shouldNotBeCalled();

        $this->getSettlementDateRangeForVendor($vendor, null, $cyclical)->shouldBeLike([$from, $to]);
    }
}
