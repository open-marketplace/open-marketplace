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
use Webmozart\Assert\Assert;

final class VirtualWalletSettlementPeriodResolver extends AbstractSettlementPeriodResolverStrategy
{
    private const SETTLEMENT_FREQUENCY = VendorSettlementFrequency::VIRTUAL_WALLET;

    public function resolve(?\DateTimeInterface $lastSettlementCreatedAt): array
    {
        Assert::isInstanceOf($lastSettlementCreatedAt, \DateTime::class);

        return [
            $lastSettlementCreatedAt->modify('+1 second'),
            new \DateTime(),
        ];
    }

    public function getSettlementFrequency(): string
    {
        return self::SETTLEMENT_FREQUENCY;
    }
}
