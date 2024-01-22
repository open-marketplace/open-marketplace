<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Twig\Runtime;

use BitBag\OpenMarketplace\Component\Settlement\Repository\VirtualWalletRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorContextInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Webmozart\Assert\Assert;

final class VirtualWalletBalanceRuntime implements VirtualWalletBalanceRuntimeInterface
{
    public function __construct(
        private VirtualWalletRepositoryInterface $virtualWalletRepository,
        private VendorContextInterface $vendorContext,
    ) {
    }

    public function getVirtualWalletBalanceByChannel(ChannelInterface $channel): int
    {
        $vendor = $this->vendorContext->getVendor();
        Assert::isInstanceOf($vendor, VendorInterface::class);

        $virtualWallet = $this->virtualWalletRepository->findByVendorAndChannel($vendor, $channel);

        return $virtualWallet ? $virtualWallet->getBalance() : 0;
    }
}
