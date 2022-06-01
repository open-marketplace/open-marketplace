<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Action\StateMachine\Transition;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Transitions\ProductListingTransitions;
use SM\Factory\FactoryInterface;

final class ProductListingStateMachineTransition implements ProductListingStateMachineTransitionInterface
{
    private FactoryInterface $productListingStateMachineFactory;

    public function __construct(FactoryInterface $productListingStateMachineFactory)
    {
        $this->productListingStateMachineFactory = $productListingStateMachineFactory;
    }

    public function apply(
        ProductListingInterface $productListing,
        string $transition
    ): void {
        $stateMachine = $this->productListingStateMachineFactory->get(
            $productListing,
            ProductListingTransitions::GRAPH
        );

        if (!$stateMachine->can($transition)) {
            return;
        }

        $stateMachine->apply($transition);
    }
}
