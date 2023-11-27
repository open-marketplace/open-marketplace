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

abstract class AbstractSettlementPeriodResolverStrategy
{
    public function supports(VendorInterface $vendor): bool
    {
        return $vendor->getSettlementFrequency() === static::SETTLEMENT_FREQUENCY;
    }

    abstract public function resolve(): array;
}
