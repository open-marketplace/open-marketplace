<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Action\StateMachine\Transition;

use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransition;
use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Transitions\ProductDraftTransitions;
use PhpSpec\ObjectBehavior;
use SM\Factory\FactoryInterface;
use SM\StateMachine\StateMachineInterface;

final class ProductDraftStateMachineTransitionSpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $productDraftStateMachineFactory
    ): void {
        $this->beConstructedWith(
            $productDraftStateMachineFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductDraftStateMachineTransition::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(ProductDraftStateMachineTransitionInterface::class);
    }

    public function it_applies_transition(
        DraftInterface $productDraft,
        FactoryInterface $productDraftStateMachineFactory,
        StateMachineInterface $stateMachine
    ): void {
        $productDraftStateMachineFactory->get(
            $productDraft,
            ProductDraftTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->willReturn(true);

        $stateMachine->apply(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->willReturn(true);

        $productDraftStateMachineFactory->get($productDraft, ProductDraftTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->shouldBeCalled();

        $stateMachine->apply(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->shouldBeCalled();

        $this->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_ACCEPT);
    }

    public function it_cannot_apply_transition(
        DraftInterface $productDraft,
        FactoryInterface $productDraftStateMachineFactory,
        StateMachineInterface $stateMachine
    ): void {
        $productDraftStateMachineFactory->get(
            $productDraft,
            ProductDraftTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->willReturn(false);

        $productDraftStateMachineFactory->get($productDraft, ProductDraftTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->shouldBeCalled();

        $stateMachine->apply(ProductDraftTransitions::TRANSITION_ACCEPT)
            ->shouldNotBeCalled();

        $this->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_ACCEPT);
    }
}
