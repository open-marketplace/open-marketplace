<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\Order;
use Sylius\Component\Core\Model\OrderInterface;

final class OrderFactory implements OrderFactoryInterface
{
    private string $FQN;

    public function __construct(string $FQN)
    {
        $this->FQN = $FQN;
    }

    public function createNew(): OrderInterface
    {
        $FQN = $this->FQN;
        return new $FQN();
    }
}
