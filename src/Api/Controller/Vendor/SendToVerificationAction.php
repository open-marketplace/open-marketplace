<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Controller\Vendor;

use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftTransitions;

final class SendToVerificationAction
{
    private ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition;

    public function __construct(ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition)
    {
        $this->productDraftStateMachineTransition = $productDraftStateMachineTransition;
    }

    public function __invoke(ListingInterface $data): ListingInterface
    {
        if ($data->canBeVerified()) {
            $latestDraft = $data->getLatestDraft();
            $this->productDraftStateMachineTransition->applyIfCan($latestDraft, DraftTransitions::TRANSITION_SEND_TO_VERIFICATION);
        }

        return $data;
    }
}
