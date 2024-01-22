<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\Manager;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Creator\VirtualWalletCreatorInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Settlement\Manager\VirtualWalletManager;
use BitBag\OpenMarketplace\Component\Settlement\Manager\VirtualWalletManagerInterface;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Doctrine\ORM\UnitOfWork;
use Mockery;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ChannelInterface;

final class VirtualWalletManagerSpec extends ObjectBehavior
{
    public function let(
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
    ): void {
        $this->beConstructedWith(
            $virtualWalletCreator,
            $entityManager,
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VirtualWalletManager::class);
    }

    public function it_implements_virtual_wallet_manager_interface(): void
    {
        $this->shouldImplement(VirtualWalletManagerInterface::class);
    }

    public function it_does_not_stash_order_if_primary_order(
        OrderInterface $order,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $order->getVendor()->willReturn(null);

        $order->getChannel()->shouldNotBeCalled();
        $vendor->getSettlementFrequency()->shouldNotBeCalled();
        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->shouldNotBeCalled();
        $virtualWallet->stash($order)->shouldNotBeCalled();

        $entityManager->persist($virtualWallet)->shouldNotBeCalled();

        $this->stash($order);
    }

    public function it_does_not_stash_order_if_unsupported_frequency(
        OrderInterface $order,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $order->getVendor()->willReturn($vendor);
        $order->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::WEEKLY);

        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->shouldNotBeCalled();
        $virtualWallet->stash($order)->shouldNotBeCalled();

        $entityManager->persist($virtualWallet)->shouldNotBeCalled();

        $this->stash($order);
    }

    public function it_stashes_order(
        OrderInterface $order,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $order->getVendor()->willReturn($vendor);
        $order->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::VIRTUAL_WALLET);

        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->stash($order)->shouldBeCalled();

        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $this->stash($order);
    }

    public function it_withdraws_if_frequency_supports_wallet_operations(
        SettlementInterface $settlement,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $settlement->getVendor()->willReturn($vendor);
        $settlement->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::VIRTUAL_WALLET);
        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->withdraw($settlement)->shouldBeCalled();
        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $this->withdraw($settlement);
    }

    public function it_does_not_withdraw_for_invalid_change_set(
        SettlementInterface $settlement,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $settlement->getVendor()->willReturn($vendor);
        $settlement->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::WEEKLY);
        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->withdraw($settlement)->shouldBeCalled();
        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $eventArgs = new PostUpdateEventArgs(
            $settlement->getWrappedObject(),
            $entityManager->getWrappedObject(),
        );

        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->shouldNotBeCalled();
        $virtualWallet->withdraw($settlement)->shouldNotBeCalled();
        $entityManager->persist($virtualWallet)->shouldNotBeCalled();

        $this->withdraw($settlement, $eventArgs);
    }

    public function it_does_not_withdraw_for_invalid_event_object(
        SettlementInterface $settlement,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $settlement->getVendor()->willReturn($vendor);
        $settlement->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::WEEKLY);
        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->withdraw($settlement)->shouldBeCalled();
        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $eventArgs = new PostUpdateEventArgs(
            $vendor->getWrappedObject(),
            $entityManager->getWrappedObject(),
        );

        $unitOfWork = Mockery::mock(UnitOfWork::class);
        $unitOfWork->shouldReceive('getEntityChangeSet')->withArgs([$vendor->getWrappedObject()])->andReturn(['foo' => ['bar', 'baz']]);
        $entityManager->getUnitOfWork()->willReturn($unitOfWork);

        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->shouldNotBeCalled();
        $virtualWallet->withdraw($settlement)->shouldNotBeCalled();
        $entityManager->persist($virtualWallet)->shouldNotBeCalled();

        $this->withdraw($settlement, $eventArgs);
    }

    public function it_does_not_withdraw_for_invalid_previous_frequency(
        SettlementInterface $settlement,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $settlement->getVendor()->willReturn($vendor);
        $settlement->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::WEEKLY);
        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->withdraw($settlement)->shouldBeCalled();
        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $eventArgs = new PostUpdateEventArgs(
            $vendor->getWrappedObject(),
            $entityManager->getWrappedObject(),
        );

        $unitOfWork = Mockery::mock(UnitOfWork::class);
        $unitOfWork->shouldReceive('getEntityChangeSet')->withArgs([$vendor->getWrappedObject()])->andReturn([
            'settlementFrequency' => ['bar', VendorSettlementFrequency::VIRTUAL_WALLET],
        ]);
        $entityManager->getUnitOfWork()->willReturn($unitOfWork);

        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->shouldNotBeCalled();
        $virtualWallet->withdraw($settlement)->shouldNotBeCalled();
        $entityManager->persist($virtualWallet)->shouldNotBeCalled();

        $this->withdraw($settlement, $eventArgs);
    }

    public function it_withdraws_for_virtual_wallet_previous_frequency(
        SettlementInterface $settlement,
        VendorInterface $vendor,
        ChannelInterface $channel,
        VirtualWalletInterface $virtualWallet,
        VirtualWalletCreatorInterface $virtualWalletCreator,
        EntityManagerInterface $entityManager,
        ): void {
        $settlement->getVendor()->willReturn($vendor);
        $settlement->getChannel()->willReturn($channel);

        $vendor->getSettlementFrequency()->willReturn(VendorSettlementFrequency::WEEKLY);
        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->withdraw($settlement)->shouldBeCalled();
        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $eventArgs = new PostUpdateEventArgs(
            $vendor->getWrappedObject(),
            $entityManager->getWrappedObject(),
        );

        $unitOfWork = Mockery::mock(UnitOfWork::class);
        $unitOfWork->shouldReceive('getEntityChangeSet')->withArgs([$vendor->getWrappedObject()])->andReturn([
            'settlementFrequency' => [VendorSettlementFrequency::VIRTUAL_WALLET, 'baz'],
        ]);
        $entityManager->getUnitOfWork()->willReturn($unitOfWork);

        $virtualWalletCreator->createForVendorAndChannel($vendor, $channel)->willReturn($virtualWallet);
        $virtualWallet->withdraw($settlement)->shouldBeCalled();
        $entityManager->persist($virtualWallet)->shouldBeCalled();

        $this->withdraw($settlement, $eventArgs);
    }
}
