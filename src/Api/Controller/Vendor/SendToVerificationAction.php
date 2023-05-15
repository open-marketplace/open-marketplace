<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Controller\Vendor;

use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Transitions\ProductDraftTransitions;

final class SendToVerificationAction
{
    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    public function __construct(ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition)
    {
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
    }

    public function __invoke(ProductListingInterface $data): ProductListingInterface
    {
        $productDraft = $data->getLatestDraft();

        if (null !== $productDraft && ProductDraftInterface::STATUS_CREATED === $productDraft->getStatus()) {
            $this->productDraftStateMachineTransition->applyIfCan($productDraft, ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
        }

        return $data;
    }
}
