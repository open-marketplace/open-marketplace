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
        bool $cyclical = true,
        ?\DateTimeInterface $lastSettlementEndsAt = null,
        ): array {
        /** @var AbstractSettlementPeriodResolverStrategy $settlementPeriodResolver */
        foreach ($this->settlementPeriodResolvers as $settlementPeriodResolver) {
            if (!$settlementPeriodResolver->supports($vendor, $cyclical)) {
                continue;
            }
            $lastSettlementEndsAt = $lastSettlementEndsAt ?? $vendor->getCreatedAt();

            [$from, $to] = $settlementPeriodResolver->resolve($lastSettlementEndsAt);

            return [
                $from < $lastSettlementEndsAt ? $from : \DateTime::createFromInterface($lastSettlementEndsAt)->modify('+1 second'),
                $to,
            ];
        }

        throw new \InvalidArgumentException(sprintf('Could not find period resolver for vendor with settlement frequency "%s"', $vendor->getSettlementFrequency()));
    }
}
