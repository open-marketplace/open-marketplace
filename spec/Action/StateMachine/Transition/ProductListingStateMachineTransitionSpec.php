<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition;

use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductListingStateMachineTransition;
use BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition\ProductListingStateMachineTransitionInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductListingTransitions;
use PhpSpec\ObjectBehavior;
use SM\Factory\FactoryInterface;
use SM\StateMachine\StateMachineInterface;

final class ProductListingStateMachineTransitionSpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $productListingStateMachineFactory
    ): void {
        $this->beConstructedWith(
            $productListingStateMachineFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductListingStateMachineTransition::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(ProductListingStateMachineTransitionInterface::class);
    }

    public function it_applies_transition(
        ProductListingInterface $productListing,
        FactoryInterface $productListingStateMachineFactory,
        StateMachineInterface $stateMachine
    ): void {
        $productListingStateMachineFactory->get(
            $productListing,
            ProductListingTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(ProductListingTransitions::TRANSITION_VERIFY)
            ->willReturn(true);

        $stateMachine->apply(ProductListingTransitions::TRANSITION_VERIFY)
            ->willReturn(true);

        $productListingStateMachineFactory->get($productListing, ProductListingTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(ProductListingTransitions::TRANSITION_VERIFY)
            ->shouldBeCalled();

        $stateMachine->apply(ProductListingTransitions::TRANSITION_VERIFY)
            ->shouldBeCalled();

        $this->apply($productListing, ProductListingTransitions::TRANSITION_VERIFY);
    }

    public function it_cannot_apply_transition(
        ProductListingInterface $productListing,
        FactoryInterface $productListingStateMachineFactory,
        StateMachineInterface $stateMachine
    ): void {
        $productListingStateMachineFactory->get(
            $productListing,
            ProductListingTransitions::GRAPH
        )->willReturn($stateMachine);

        $stateMachine->can(ProductListingTransitions::TRANSITION_VERIFY)
            ->willReturn(false);

        $productListingStateMachineFactory->get($productListing, ProductListingTransitions::GRAPH)
            ->shouldBeCalled();

        $stateMachine->can(ProductListingTransitions::TRANSITION_VERIFY)
            ->shouldBeCalled();

        $stateMachine->apply(ProductListingTransitions::TRANSITION_VERIFY)
            ->shouldNotBeCalled();

        $this->apply($productListing, ProductListingTransitions::TRANSITION_VERIFY);
    }
}
