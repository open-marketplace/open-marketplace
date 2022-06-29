<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductDraftStateMachineTransition;
use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
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
        ProductDraftInterface $productDraft,
        FactoryInterface $productDraftStateMachineFactory,
        StateMachineInterface $stateMachine
    ): void {
        $productDraftStateMachineFactory->get(
            $productDraft,
            ProductDraftTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(ProductDraftTransitions::TRANSITION_VERIFY)
            ->willReturn(true);

        $stateMachine->apply(ProductDraftTransitions::TRANSITION_VERIFY)
            ->willReturn(true);

        $productDraftStateMachineFactory->get($productDraft, ProductDraftTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(ProductDraftTransitions::TRANSITION_VERIFY)
            ->shouldBeCalled();

        $stateMachine->apply(ProductDraftTransitions::TRANSITION_VERIFY)
            ->shouldBeCalled();

        $this->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_VERIFY);
    }

    public function it_cannot_apply_transition(
        ProductDraftInterface $productDraft,
        FactoryInterface $productDraftStateMachineFactory,
        StateMachineInterface $stateMachine
    ): void {
        $productDraftStateMachineFactory->get(
            $productDraft,
            ProductDraftTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(ProductDraftTransitions::TRANSITION_VERIFY)
            ->willReturn(false);

        $productDraftStateMachineFactory->get($productDraft, ProductDraftTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(ProductDraftTransitions::TRANSITION_VERIFY)
            ->shouldBeCalled();

        $stateMachine->apply(ProductDraftTransitions::TRANSITION_VERIFY)
            ->shouldNotBeCalled();

        $this->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_VERIFY);
    }
}
