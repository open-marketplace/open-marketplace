<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Order\StateMachine;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Manager\VirtualWalletManagerInterface;
use Doctrine\Persistence\ObjectManager;

final class OrderCallbacks
{
    public function __construct(
        private ObjectManager $objectManager,
        private VirtualWalletManagerInterface $virtualWalletManager,
    ) {
    }

    public function setPaidAt(OrderInterface $order): void
    {
        $order->setPaidAt(new \DateTime());
        $this->virtualWalletManager->stash($order);

        $this->objectManager->persist($order);
        $this->objectManager->flush();
    }
}
