<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\QuarterlySettlementPeriodResolver;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class QuarterlySettlementPeriodResolverSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(QuarterlySettlementPeriodResolver::class);
    }

    public function it_support_vendor_when_settlement_frequency_is_quarterly(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn('quarterly');

        $this->supports($vendor)->shouldBe(true);
    }

    public function it_does_not_support_vendor_when_settlement_frequency_is_not_quarterly(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn('weekly');

        $this->supports($vendor)->shouldBe(false);
    }

    public function it_returns_valid_next_settlement_start_and_end_date_time(
    ): void {
        $this->resolve()->shouldBeLike([
            (new \DateTime())->setTimestamp($this->getLastQuarterStartDate()),
            (new \DateTime())->setTimestamp($this->getLastQuarterEndDate()),
        ]);
    }

    private function getLastQuarterStartDate(): int
    {
        $month = date('n');
        $countLastQuarterEndMonthAgo = (int) abs(((ceil($month / 3) - 1) * 3) - $month);

        $dateTime = mktime(
            00,
            00,
            00,
            $month - $countLastQuarterEndMonthAgo - 2,
            1,
            (int) date('Y')
        );

        if (false === $dateTime) {
            throw new \RuntimeException('Cannot generate last quarter start date');
        }

        return $dateTime;
    }

    private function getLastQuarterEndDate(): int
    {
        $month = date('n');
        $countLastQuarterEndMonthAgo = (int) abs(((ceil($month / 3) - 1) * 3) - $month);

        $dateTime = mktime(
            23,
            59,
            59,
            $month - $countLastQuarterEndMonthAgo + 1,
            0,
            (int) date('Y')
        );
        if (false === $dateTime) {
            throw new \RuntimeException('Cannot generate last quarter end date');
        }

        return $dateTime;
    }
}
