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

    public function it_does_nothing_when_cant_be_verified(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ListingInterface $productListing,
    ): void {
        $productListing->canBeVerified()->willReturn(false);

        $this->__invoke($productListing)->shouldReturn($productListing);
    }

    public function it_applies_when_can(
        ProductDraftStateMachineTransitionInterface $productDraftStateMachineTransition,
        ListingInterface $productListing,
        DraftInterface $productDraft
    ): void {
        $productListing->canBeVerified()->willReturn(true);
        $productListing->getLatestDraft()->willReturn($productDraft);

        $productDraftStateMachineTransition->applyIfCan($productDraft, DraftTransitions::TRANSITION_SEND_TO_VERIFICATION)
            ->shouldBeCalled();

        $this->__invoke($productListing)->shouldReturn($productListing);
    }
}
