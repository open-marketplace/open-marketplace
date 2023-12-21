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

final class QuarterlySettlementPeriodResolver extends AbstractSettlementPeriodResolverStrategy
{
    protected const SETTLEMENT_FREQUENCY = VendorSettlementFrequency::QUARTERLY;

    public function resolve(?\DateTimeInterface $lastSettlementEndsAt): array
    {
        return [
            (new \DateTime())->setTimestamp(self::getLastQuarterStartDate()),
            (new \DateTime())->setTimestamp(self::getLastQuarterEndDate()),
        ];
    }

    public function getSettlementFrequency(): string
    {
        return self::SETTLEMENT_FREQUENCY;
    }

    public static function getLastQuarterStartDate(): int
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

    public static function getLastQuarterEndDate(): int
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
