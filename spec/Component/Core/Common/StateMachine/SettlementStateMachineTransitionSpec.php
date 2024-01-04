<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Common\StateMachine;

use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\SettlementStateMachineTransition;
use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\SettlementStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Component\Settlement\Contracts\SettlementTransitions;
use BitBag\OpenMarketplace\Component\Settlement\Entity\SettlementInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use SM\Factory\FactoryInterface;
use SM\StateMachine\StateMachineInterface;

final class SettlementStateMachineTransitionSpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $settlementStateMachineFactory,
        EntityManagerInterface $entityManager,
    ): void {
        $this->beConstructedWith(
            $settlementStateMachineFactory,
            $entityManager,
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SettlementStateMachineTransition::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(SettlementStateMachineTransitionInterface::class);
    }

    public function it_applies_transition(
        SettlementInterface $settlement,
        FactoryInterface $settlementStateMachineFactory,
        EntityManagerInterface $entityManager,
        StateMachineInterface $stateMachine,
        ): void {
        $settlementStateMachineFactory->get(
            $settlement,
            SettlementTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(SettlementTransitions::ACCEPT)
            ->willReturn(true);

        $stateMachine->apply(SettlementTransitions::ACCEPT)
            ->willReturn(true);

        $stateMachine->can(SettlementTransitions::ACCEPT)
            ->shouldBeCalled();

        $stateMachine->apply(SettlementTransitions::ACCEPT)
            ->shouldBeCalled();

        $settlementStateMachineFactory->get($settlement, SettlementTransitions::GRAPH)
            ->shouldBeCalled();

        $entityManager->persist($settlement)
            ->shouldBeCalled();

        $this->applyIfCan($settlement, SettlementTransitions::ACCEPT);
    }

    public function it_cannot_apply_transition(
        SettlementInterface $settlement,
        FactoryInterface $settlementStateMachineFactory,
        EntityManagerInterface $entityManager,
        StateMachineInterface $stateMachine,
        ): void {
        $settlementStateMachineFactory->get(
            $settlement,
            SettlementTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(SettlementTransitions::SETTLE)
            ->willReturn(false);

        $settlementStateMachineFactory->get($settlement, SettlementTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(SettlementTransitions::SETTLE)
            ->shouldBeCalled();

        $stateMachine->apply(SettlementTransitions::SETTLE)
            ->shouldNotBeCalled();

        $entityManager->persist($settlement)
            ->shouldNotBeCalled();

        $this->applyIfCan($settlement, SettlementTransitions::SETTLE);
    }
}
