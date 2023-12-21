<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Common\StateMachine;

use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\SettlementCallbacks;
use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\SettlementCallbacksInterface;
use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\SettlementStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Component\Settlement\Contracts\SettlementTransitions;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use PhpSpec\ObjectBehavior;

final class SettlementCallbacksSpec extends ObjectBehavior
{
    public function let(SettlementStateMachineTransitionInterface $settlementStateMachineTransition): void
    {
        $this->beConstructedWith(
            $settlementStateMachineTransition
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SettlementCallbacks::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(SettlementCallbacksInterface::class);
    }

    public function it_should_apply_payout_transaction(
        SettlementStateMachineTransitionInterface $settlementStateMachineTransition,
        SettlementInterface $settlement
    ): void {
        $settlementStateMachineTransition->applyIfCan(
            $settlement,
            SettlementTransitions::SETTLE,
            true
        )->shouldBeCalled();

        $this->payout($settlement);
    }
}
