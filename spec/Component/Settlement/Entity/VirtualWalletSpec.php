<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Settlement\Entity;

use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWallet;
use BitBag\OpenMarketplace\Component\Settlement\Entity\VirtualWalletInterface;
use BitBag\OpenMarketplace\Component\Settlement\Exception\NotEnoughFundsException;
use PhpSpec\ObjectBehavior;

final class VirtualWalletSpec extends ObjectBehavior
{
    public function let(OrderInterface $order, SettlementInterface $settlement): void
    {
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VirtualWallet::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(VirtualWalletInterface::class);
    }

    public function it_throws_exception_if_balance_not_enough(
        SettlementInterface $settlement,
    ): void {
        $settlement->getTotalProfitAmount()->willReturn(1000);

        $this->getBalance()->shouldBeLike(0);
        $this->shouldThrow(NotEnoughFundsException::class)->during('withdraw', [$settlement]);
    }

    public function it_stashes_order(
        OrderInterface $order,
    ): void {
        $order->getTotalProfitAmount()->willReturn(500);
        $this->getBalance()->shouldBeLike(0);

        $this->stash($order);
        $this->getBalance()->shouldBeLike(500);
    }

    public function it_withdraws_when_balance_is_enough(
        SettlementInterface $settlement,
        OrderInterface $order,
    ): void {
        $order->getTotalProfitAmount()->willReturn(500);
        $settlement->getTotalProfitAmount()->willReturn(100);

        $this->getBalance()->shouldBeLike(0);
        $this->stash($order);
        $this->getBalance()->shouldBeLike(500);
        $this->withdraw($settlement);
        $this->getBalance()->shouldBeLike(400);
    }
}
