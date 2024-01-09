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

            $vendorCreatedAt = $vendor->getCreatedAt();

            [$from, $to] = $settlementPeriodResolver->resolve($lastSettlementEndsAt ?? $vendorCreatedAt);

            return [
                $this->getFrom($from, $to, $lastSettlementEndsAt),
                $to,
            ];
        }

        throw new \InvalidArgumentException(sprintf('Could not find period resolver for vendor with settlement frequency "%s"', $vendor->getSettlementFrequency()));
    }

    private function getFrom(
        \DateTime $from,
        \DateTime $to,
        ?\DateTimeInterface $lastSettlementEndsAt
    ): \DateTime {
        if (
            null === $lastSettlementEndsAt
            || ($from >= $lastSettlementEndsAt
            || $to <= $lastSettlementEndsAt)
        ) {
            return $from;
        }

        return \DateTime::createFromInterface($lastSettlementEndsAt)->modify('+1 second');
    }
}
