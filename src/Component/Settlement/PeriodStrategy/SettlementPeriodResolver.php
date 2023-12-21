<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

final class SettlementPeriodResolver implements SettlementPeriodResolverInterface
{
    public function __construct(
        private iterable $settlementPeriodResolvers
    ) {
    }

    public function getSettlementDateRangeForVendor(
        VendorInterface $vendor,
        ?\DateTimeInterface $lastSettlementCreatedAt = null,
        $cyclical = true
    ): array {
        /** @var AbstractSettlementPeriodResolverStrategy $settlementPeriodResolver */
        foreach ($this->settlementPeriodResolvers as $settlementPeriodResolver) {
            if ($settlementPeriodResolver->supports($vendor, $cyclical)) {
                return $settlementPeriodResolver->resolve($lastSettlementCreatedAt ?? $vendor->getCreatedAt());
            }
        }

        throw new \InvalidArgumentException(sprintf('Could not find period resolver for vendor with settlement frequency "%s"', $vendor->getSettlementFrequency()));
    }
}
