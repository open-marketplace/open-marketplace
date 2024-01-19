<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Creator;

use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\VirtualWalletFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\VirtualWalletRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;

final class VirtualWalletCreator implements VirtualWalletCreatorInterface
{
    public function __construct(
        private VirtualWalletFactoryInterface $virtualWalletFactory,
        private VirtualWalletRepositoryInterface $virtualWalletRepository,
    ) {
    }

    public function createForVendorAndChannel(
        VendorInterface $vendor,
        ChannelInterface $channel
    ): VirtualWalletInterface {
        $virtualWallet = $this->virtualWalletRepository->findByVendorAndChannel($vendor, $channel);

        if (null !== $virtualWallet) {
            return $virtualWallet;
        }

        return $this->virtualWalletFactory->createForVendorAndChannel($vendor, $channel);
    }
}
