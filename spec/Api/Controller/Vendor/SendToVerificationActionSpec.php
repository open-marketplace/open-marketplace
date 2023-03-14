<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Controller\Vendor;

use BitBag\OpenMarketplace\Action\StateMachine\Transition\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Api\Controller\Vendor\SendToVerificationAction;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Transitions\ProductDraftTransitions;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class SendToVerificationActionSpec extends ObjectBehavior
{
    public function let(ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition): void
    {
        $this->beConstructedWith($productDraftStateMachineTransition);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(SendToVerificationAction::class);
    }

    public function it_do_nothing_if_last_draft_is_null(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductListingInterface $productListing,
    ): void {
        $productListing->getLatestDraft()->willReturn(null);

        $this($productListing)->shouldReturn($productListing);

        $productDraftStateMachineTransition->applyIfCan(Argument::any(), ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION)->shouldNotHaveBeenCalled();
    }

    public function it_do_nothing_if_last_draft_is_not_in_status_created(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductListingInterface $productListing,
        ProductDraftInterface $productDraft
    ): void {
        $productDraft->getStatus()->willReturn(ProductDraftInterface::STATUS_VERIFIED);
        $productListing->getLatestDraft()->willReturn($productDraft);

        $this($productListing)->shouldReturn($productListing);

        $productDraftStateMachineTransition->applyIfCan(Argument::any(), ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION)->shouldNotHaveBeenCalled();
    }

    public function it_set_status_in_last_draft(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ProductListingInterface $productListing,
        ProductDraftInterface $productDraft
    ): void {
        $productDraft->getStatus()->willReturn(ProductDraftInterface::STATUS_CREATED);
        $productListing->getLatestDraft()->willReturn($productDraft);

        $this($productListing)->shouldReturn($productListing);

        $productDraftStateMachineTransition->applyIfCan(Argument::any(), ProductDraftTransitions::TRANSITION_SEND_TO_VERIFICATION)->shouldHaveBeenCalled();
    }
}
