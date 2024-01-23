<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Manager;

use BitBag\OpenMarketplace\Component\Core\Vendor\EventListener\VendorListener;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Creator\VirtualWalletCreatorInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Sylius\Component\Core\Model\ChannelInterface;
use Webmozart\Assert\Assert;

final class VirtualWalletManager implements VirtualWalletManagerInterface
{
    public function __construct(
        private VirtualWalletCreatorInterface $virtualWalletCreator,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function stash(OrderInterface $order): void
    {
        $vendor = $order->getVendor();

        if (!$vendor instanceof VendorInterface) {
            return;
        }

        $channel = $order->getChannel();
        Assert::isInstanceOf($channel, ChannelInterface::class);

        if (!$this->supportsWalletOperations($vendor)) {
            return;
        }

        $virtualWallet = $this->virtualWalletCreator->createForVendorAndChannel($vendor, $channel);
        $virtualWallet->stash($order);

        $this->entityManager->persist($virtualWallet);
    }

    public function withdraw(SettlementInterface $settlement, PostUpdateEventArgs $eventArgs = null): void
    {
        $vendor = $settlement->getVendor();
        $channel = $settlement->getChannel();

        if (!$this->supportsWalletOperations($vendor, $eventArgs)) {
            return;
        }

        $virtualWallet = $this->virtualWalletCreator->createForVendorAndChannel($vendor, $channel);
        $virtualWallet->withdraw($settlement);

        $this->entityManager->persist($virtualWallet);
    }

    private function supportsWalletOperations(VendorInterface $vendor, PostUpdateEventArgs $eventArgs = null): bool
    {
        $supportsWalletOperation = VendorSettlementFrequency::VIRTUAL_WALLET === $vendor->getSettlementFrequency();

        if ($supportsWalletOperation || null === $eventArgs) {
            return $supportsWalletOperation;
        }

        $vendor = $eventArgs->getObject();
        if (!$vendor instanceof VendorInterface) {
            return false;
        }

        $objectManager = $eventArgs->getObjectManager();
        $unitOfWork = $objectManager->getUnitOfWork();
        $changeSet = $unitOfWork->getEntityChangeSet($vendor);

        if (!array_key_exists(VendorListener::SETTLEMENT_FREQUENCY, $changeSet)) {
            return false;
        }

        $vendorChangeSet = $changeSet[VendorListener::SETTLEMENT_FREQUENCY];
        $previousFrequency = $vendorChangeSet[0];

        return VendorSettlementFrequency::VIRTUAL_WALLET === $previousFrequency;
    }
}
