<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductDraftTransitions;
use SM\Factory\FactoryInterface;

final class ProductDraftStateMachineTransition implements ProductDraftStateMachineTransitionInterface
{
    private FactoryInterface $productDraftStateMachineFactory;

    public function __construct(FactoryInterface $productDraftStateMachineFactory)
    {
        $this->productDraftStateMachineFactory = $productDraftStateMachineFactory;
    }

    public function applyIfCan(
        ProductDraftInterface $productDraft,
        string $transition
    ): void {
        $stateMachine = $this->productDraftStateMachineFactory->get(
            $productDraft,
            ProductDraftTransitions::GRAPH
        );

        if (!$stateMachine->can($transition)) {
            return;
        }

        $stateMachine->apply($transition);
    }
}
