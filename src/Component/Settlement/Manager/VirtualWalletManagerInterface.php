<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Settlement\Manager;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use Doctrine\ORM\Event\PostUpdateEventArgs;

interface VirtualWalletManagerInterface
{
    public function stash(OrderInterface $order): void;

    public function withdraw(SettlementInterface $settlement, PostUpdateEventArgs $eventArgs = null): void;
}
