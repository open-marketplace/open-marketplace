<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\PeriodStrategy;

final class WeeklySettlementPeriodResolver extends AbstractSettlementPeriodResolverStrategy
{
    protected const SETTLEMENT_FREQUENCY = 'weekly';

    public function resolve(): array
    {
        return [
            new \DateTime('last week monday 00:00:00'),
            new \DateTime('last week sunday 23:59:59'),
        ];
    }

    public function getSettlementFrequency(): string
    {
        return self::SETTLEMENT_FREQUENCY;
    }
}
