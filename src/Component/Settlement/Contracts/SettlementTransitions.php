<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Contracts;

interface SettlementTransitions
{
    public const ACCEPT = 'accept';

    public const SETTLE = 'settle';

    public const GRAPH = 'open_marketplace_settlement';
}
