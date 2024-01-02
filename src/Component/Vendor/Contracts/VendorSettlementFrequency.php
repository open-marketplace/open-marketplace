<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Contracts;

interface VendorSettlementFrequency
{
    public const DEFAULT_SETTLEMENT_FREQUENCY = self::WEEKLY;

    public const WEEKLY = 'weekly';

    public const MONTHLY = 'monthly';

    public const QUARTERLY = 'quarterly';

    public const SETTLEMENT_FREQUENCIES = [
        self::QUARTERLY,
        self::MONTHLY,
        self::WEEKLY,
    ];
}
