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
        $vendor->getCreatedAt()->willReturn(new \DateTime());

        $resolverA->supports($vendor, $cyclical)->willReturn(false);
        $resolverA->resolve()->shouldNotBeCalled();

        $resolverB->supports($vendor, $cyclical)->willReturn(false);
        $resolverB->resolve()->shouldNotBeCalled();

        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('getSettlementDateRangeForVendor', [$vendor->getWrappedObject(), $cyclical, null]);
    }

    public function it_should_call_only_one_resolver(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
        ): void {
        $cyclical = true;

        $from = new \DateTime('-1 month');
        $to = new \DateTime();
        $vendorCreatedAt = new \DateTime('-2 month');

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);
        $vendor->getCreatedAt()->willReturn($vendorCreatedAt);

        $resolverA->supports($vendor, $cyclical)->willReturn(true);
        $resolverA->resolve($from)->willReturn([$from, $to]);
        $resolverB->supports($vendor, $cyclical)->shouldNotBeCalled();
        $resolverB->resolve(null)->shouldNotBeCalled();

        $this->getSettlementDateRangeForVendor($vendor, $cyclical)->shouldBeLike([$from, $to]);
    }

    public function it_should_only_call_second_one_resolver(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
        ): void {
        $cyclical = true;

        $from = new \DateTime('-1 month');
        $to = new \DateTime();
        $vendorCreatedAt = new \DateTime('-2 month');

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);
        $vendor->getCreatedAt()->willReturn($vendorCreatedAt);

        $resolverB->supports($vendor, $cyclical)->willReturn(true);
        $resolverB->resolve($from)->willReturn([$from, $to]);
        $resolverA->supports($vendor, $cyclical)->willReturn(false);

        $resolverA->resolve(null)->shouldNotBeCalled();

        $this->getSettlementDateRangeForVendor($vendor, $cyclical)->shouldBeLike([$from, $to]);
    }

    public function it_should_provide_longer_period_if_from_smaller_than_last_settlement_ends_at(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
        AbstractSettlementPeriodResolverStrategy $resolverB,
        ): void {
        $cyclical = true;

        $from = new \DateTime('-1 month');
        $lastSettlementsEndsAt = $from->modify('-1 week');
        $to = new \DateTime();

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);

        $resolverB->supports($vendor, $cyclical)->willReturn(true);
        $resolverB->resolve($from)->willReturn([$from, $to]);
        $resolverA->supports($vendor, $cyclical)->willReturn(false);
        $resolverA->resolve(null)->shouldNotBeCalled();

        $this->getSettlementDateRangeForVendor($vendor, $cyclical, $lastSettlementsEndsAt)->shouldBeLike([$lastSettlementsEndsAt->modify('+ 1 second'), $to]);
    }

    public function it_should_use_created_at_from_vendor(
        VendorInterface $vendor,
        AbstractSettlementPeriodResolverStrategy $resolverA,
    ): void {
        $cyclical = true;

        $vendorCreatedAt = new \DateTime('-2 weeks');
        $from = new \DateTime('-1 month');
        $to = new \DateTime();

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);
        $vendor->getCreatedAt()->willReturn($vendorCreatedAt);

        $resolverA->supports($vendor, $cyclical)->willReturn(true);
        $resolverA->resolve($from)->willReturn([$from, $to]);

        $this->getSettlementDateRangeForVendor($vendor, $cyclical)->shouldBeLike([$vendorCreatedAt->modify('+ 1 second'), $to]);
    }
}
