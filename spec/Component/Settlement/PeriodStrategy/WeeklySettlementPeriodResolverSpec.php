<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\WeeklySettlementPeriodResolver;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class WeeklySettlementPeriodResolverSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(WeeklySettlementPeriodResolver::class);
    }

    public function it_supports_vendor_when_settlement_frequency_is_weekly(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn('weekly');

        $this->supports($vendor)->shouldBe(true);
    }

    public function it_does_not_supports_vendor_when_settlement_frequency_is_not_weekly(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn('monthly');

        $this->supports($vendor)->shouldBe(false);
    }

    public function it_does_not_supports_vendor_when_settlement_frequency_is_not_cyclical(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn('weekly');

        $this->supports($vendor, false)->shouldBe(false);
    }

    public function it_returns_valid_next_settlement_start_and_end_date_time(
    ): void {
        $this->resolve()->shouldBeLike([
            new \DateTime('last week monday 00:00:00'),
            new \DateTime('last week sunday 23:59:59'),
        ]);
    }
}
