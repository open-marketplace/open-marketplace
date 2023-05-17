<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Calculator;

use BitBag\OpenMarketplace\Entity\OrderInterface;

class NoVendorCommissionCalculator implements VendorCommissionCalculatorInterface
{
    public function calculate(OrderInterface $order): int
    {
        return 0;
    }

    public function supports(OrderInterface $order): bool
    {
        if ($order->isPrimary()) {
            throw new \Exception('Primary order used for commission calculation');
        }

        return null === $order->getVendor();
    }

    public static function getDefaultPriority(): int
    {
        return 2;
    }
}
