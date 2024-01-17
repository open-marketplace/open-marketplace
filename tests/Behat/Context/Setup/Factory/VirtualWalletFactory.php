<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup\Factory;

use BitBag\OpenMarketplace\Component\Core\Common\Fixture\Factory\OrderExampleFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWallet;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Customer\Model\CustomerInterface;
use Webmozart\Assert\Assert;

final class VirtualWalletFactory implements VirtualWalletFactoryInterface
{
    public function __construct(
        private OrderExampleFactoryInterface $orderExampleFactory,
    ) {
    }

    public function createVirtualWalletWithBalance(
        ChannelInterface $channel,
        VendorInterface $vendor,
        CustomerInterface $customer,
        int $balance = 0,
        ): VirtualWalletInterface {
        $virtualWallet = $this->createVirtualWallet($channel, $vendor, $customer);
        $shopUser = $vendor->getShopUser();
        $customer = $shopUser->getCustomer();
        Assert::isInstanceOf($customer, CustomerInterface::class);

        $order = $this->orderExampleFactory->createOrderWithTotalAmount(
            $channel,
            $vendor,
            $customer,
            $balance,
        );

        $virtualWallet->stash($order);

        return $virtualWallet;
    }

    public function createVirtualWallet(
        ChannelInterface $channel,
        VendorInterface $vendor,
        CustomerInterface $customer,
        ): VirtualWalletInterface {
        $virtualWallet = new VirtualWallet();
        $virtualWallet->setChannel($channel);
        $virtualWallet->setVendor($vendor);

        return $virtualWallet;
    }
}
