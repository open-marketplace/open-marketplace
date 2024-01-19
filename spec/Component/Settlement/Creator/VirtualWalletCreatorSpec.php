<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\Creator;

use BitBag\OpenMarketplace\Component\Settlement\Creator\VirtualWalletCreator;
use BitBag\OpenMarketplace\Component\Settlement\Creator\VirtualWalletCreatorInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Settlement\Factory\VirtualWalletFactoryInterface;
use BitBag\OpenMarketplace\Component\Settlement\Repository\VirtualWalletRepositoryInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;

final class VirtualWalletCreatorSpec extends ObjectBehavior
{
    public function let(
        VirtualWalletFactoryInterface $virtualWalletFactory,
        VirtualWalletRepositoryInterface $virtualWalletRepository
    ): void {
        $this->beConstructedWith($virtualWalletFactory, $virtualWalletRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VirtualWalletCreator::class);
    }

    public function it_implements_virtual_wallet_creator_interface(): void
    {
        $this->shouldImplement(VirtualWalletCreatorInterface::class);
    }

    public function it_creates_virtual_wallet(
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletFactoryInterface $virtualWalletFactory,
        VirtualWalletRepositoryInterface $virtualWalletRepository
    ): void {
        $virtualWalletRepository->findByVendorAndChannel($vendor, $channel)->willReturn(null);
        $virtualWalletFactory->createForVendorAndChannel($vendor, $channel)->shouldBeCalled();

        $this->createForVendorAndChannel($vendor, $channel);
    }

    public function it_finds_virtual_wallet(
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletFactoryInterface $virtualWalletFactory,
        VirtualWalletRepositoryInterface $virtualWalletRepository
    ): void {
        $virtualWalletRepository->findByVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWalletFactory->createForVendorAndChannel($vendor, $channel)->shouldNotBeCalled();

        $this->createForVendorAndChannel($vendor, $channel);
    }
}
