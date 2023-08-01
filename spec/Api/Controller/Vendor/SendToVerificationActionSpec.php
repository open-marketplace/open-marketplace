<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Controller\Vendor;

use BitBag\OpenMarketplace\Api\Controller\Vendor\SendToVerificationAction;
use BitBag\OpenMarketplace\Component\Core\Common\StateMachine\ProductDraftStateMachineTransitionInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftTransitions;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
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
        ListingInterface $productListing,
    ): void {
        $productListing->getLatestDraft()->willReturn(null);

        $this($productListing)->shouldReturn($productListing);

        $productDraftStateMachineTransition->applyIfCan(Argument::any(), DraftTransitions::TRANSITION_SEND_TO_VERIFICATION)->shouldNotHaveBeenCalled();
    }

    public function it_do_nothing_if_last_draft_is_not_in_status_created(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ListingInterface $productListing,
        DraftInterface $productDraft
    ): void {
        $productDraft->getStatus()->willReturn(DraftInterface::STATUS_VERIFIED);
        $productListing->getLatestDraft()->willReturn($productDraft);

        $this($productListing)->shouldReturn($productListing);

        $productDraftStateMachineTransition->applyIfCan(Argument::any(), DraftTransitions::TRANSITION_SEND_TO_VERIFICATION)->shouldNotHaveBeenCalled();
    }

    public function it_set_status_in_last_draft(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ListingInterface $productListing,
        DraftInterface $productDraft
    ): void {
        $productDraft->getStatus()->willReturn(DraftInterface::STATUS_CREATED);
        $productListing->getLatestDraft()->willReturn($productDraft);

        $this($productListing)->shouldReturn($productListing);

        $productDraftStateMachineTransition->applyIfCan(Argument::any(), DraftTransitions::TRANSITION_SEND_TO_VERIFICATION)->shouldHaveBeenCalled();
    }
}
