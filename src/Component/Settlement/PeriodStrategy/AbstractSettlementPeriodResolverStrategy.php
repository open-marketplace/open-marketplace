<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

abstract class AbstractSettlementPeriodResolverStrategy
{
    public function supports(VendorInterface $vendor, bool $cyclical): bool
    {
        return
            $vendor->getSettlementFrequency() === $this->getSettlementFrequency() &&
            $this->checkSupportsFrequencyType($cyclical)
        ;
    }

    protected function checkSupportsFrequencyType(bool $cyclical): bool
    {
        return $cyclical === in_array(
                $this->getSettlementFrequency(),
                VendorSettlementFrequency::CYCLICAL_SETTLEMENT_FREQUENCIES,
                true
            )
        ;
    }

    abstract public function resolve(?\DateTimeInterface $lastSettlementEndsAt): array;

    abstract public function getSettlementFrequency(): string;
}
