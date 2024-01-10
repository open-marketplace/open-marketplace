<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Context\Setup;

use Behat\Behat\Context\Context;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUser;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Core\Model\Channel;
use Sylius\Component\Core\Model\CustomerInterface;
use Tests\BitBag\OpenMarketplace\Behat\Context\Setup\Factory\VirtualWalletFactoryInterface;
use Webmozart\Assert\Assert;

final class VirtualWalletContext implements Context
{
    public function __construct(
        private VirtualWalletFactoryInterface $virtualWalletFactory,
        private SharedStorageInterface $sharedStorage,
        private EntityManagerInterface $entityManager,
        ) {
    }

    /**
     * @Given there is a virtual wallet for vendor :vendorEmail and channel :channelName with balance :balance
     */
    public function thereIsAVirtualWalletForVendorAndChannelAndBalance(
        string $vendorEmail,
        string $channelName,
        float $balance
    ): void
    {
        $vendor = $this->getVendorByEmail($vendorEmail);
        $channel = $this->entityManager->getRepository(Channel::class)->findOneBy(['name' => $channelName]);

        $virtualWallet = $this->virtualWalletFactory->createVirtualWalletWithBalance(
            $channel,
            $vendor,
            $this->getCustomer($vendor),
            (int) floor($balance * 100),
        );

        $this->entityManager->persist($virtualWallet);
        $this->entityManager->flush();
    }

    /**
     * @Given there is a virtual wallet for channel :channelName with balance :balance
     */
    public function thereIsAVirtualWalletForChannelAndBalance(string $channelName, float $balance): void
    {
        $channel = $this->entityManager->getRepository(Channel::class)->findOneBy(['name' => $channelName]);
        $vendor = $this->sharedStorage->get('vendor');

        $virtualWallet = $this->virtualWalletFactory->createVirtualWalletWithBalance(
            $channel,
            $vendor,
            $this->getCustomer($vendor),
            (int) floor($balance * 100),
        );

        $this->entityManager->persist($virtualWallet);
        $this->entityManager->flush();
    }

    /**
     * @Given there is a virtual wallet for vendor :vendorEmail with balance :balance
     */
    public function thereIsAVirtualWalletForVendorAndBalance(string $channelName, float $balance): void
    {
        $vendor = $this->entityManager->getRepository(Vendor::class)->findOneBy(['email' => $vendorEmail]);
        $channel = $this->sharedStorage->get('channel');

        $virtualWallet = $this->virtualWalletFactory->createVirtualWalletWithBalance(
            $vendor,
            $channel,
            $this->getCustomer($vendor),
            (int) floor($balance * 100),
        );

        $this->entityManager->persist($virtualWallet);
        $this->entityManager->flush();
    }

    private function getVendorByEmail(string $vendorEmail): VendorInterface
    {
        $shopUser = $this->entityManager->getRepository(ShopUser::class)->findOneBy(['username' => $vendorEmail]);
        Assert::isInstanceOf($shopUser, ShopUser::class);

        $vendor = $shopUser->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        return $vendor;
    }

    private function getCustomer(VendorInterface $vendor): CustomerInterface
    {
        $shopUser = $vendor->getShopUser();
        Assert::isInstanceOf($shopUser, ShopUser::class);

        $customer = $shopUser->getCustomer();

        return ($customer instanceof CustomerInterface)
            ? $customer
            : $this->sharedStorage->get('customer');
    }
}
