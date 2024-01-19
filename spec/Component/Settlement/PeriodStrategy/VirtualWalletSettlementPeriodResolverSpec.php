<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

use BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy\VirtualWalletSettlementPeriodResolver;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class VirtualWalletSettlementPeriodResolverSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VirtualWalletSettlementPeriodResolver::class);
    }

    public function it_supports_vendor_when_settlement_frequency_is_quarterly(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::VIRTUAL_WALLET);

        $this->supports($vendor, false)->shouldBe(true);
    }

    public function it_does_not_supports_vendor_when_settlement_frequency_is_not_quarterly(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::MONTHLY);

        $this->supports($vendor, false)->shouldBe(false);
    }

    public function it_does_not_supports_vendor_when_settlement_frequency_is_cyclical(
        VendorInterface $vendor,
    ): void {
        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::VIRTUAL_WALLET);

        $this->supports($vendor, true)->shouldBe(false);
    }

    public function it_returns_valid_next_settlement_start_and_end_date_time(
    ): void {
        $lastSettlementEndsAt = new \DateTime('2021-01-01 00:00:00');
        [$start, $end] = $this->resolve($lastSettlementEndsAt);
        $start->shouldBeLike($lastSettlementEndsAt->modify('+1 second'));
        $end->format('Y-m-d H:i')->shouldBe((new \DateTime())->format('Y-m-d H:i'));
    }
}
