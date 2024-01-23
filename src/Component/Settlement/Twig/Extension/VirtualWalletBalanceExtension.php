<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Twig\Extension;

use BitBag\OpenMarketplace\Component\Settlement\Twig\Runtime\VirtualWalletBalanceRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class VirtualWalletBalanceExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('bitbag_open_marketplace_settlement_virtual_wallet_balance_by_channel', [VirtualWalletBalanceRuntime::class, 'getVirtualWalletBalanceByChannel']),
        ];
    }
}
