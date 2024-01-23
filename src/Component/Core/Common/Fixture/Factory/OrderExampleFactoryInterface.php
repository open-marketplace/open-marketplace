<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Bundle\CoreBundle\Fixture\Factory\ExampleFactoryInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;

interface OrderExampleFactoryInterface extends ExampleFactoryInterface
{
    public function createArray(array $options = []): array;

    public function createOrderWithTotalAmount(
        ChannelInterface $channel,
        VendorInterface $vendor,
        CustomerInterface $customer,
        int $totalAmount
    ): OrderInterface;
}
