<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Security\Voter\Vendor;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Security\Voter\Vendor\OrderVoter;
use PhpSpec\ObjectBehavior;
use SM\Factory\FactoryInterface;
use SM\StateMachine\StateMachineInterface;
use Sylius\Component\Core\OrderPaymentStates;
use Sylius\Component\Order\OrderTransitions;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

final class OrderVoterSpec extends ObjectBehavior
{
    public function let(FactoryInterface $stateMachineFactory)
    {
        $this->beConstructedWith($stateMachineFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderVoter::class);
        $this->shouldHaveType(Voter::class);
    }

    public function it_support_expected_attribute(): void
    {
        $this->supportsAttribute('VENDOR_ORDER_CANCEL')->shouldReturn(true);
    }

    public function it_does_not_support_unexpected_attribute(): void
    {
        $this->supportsAttribute('WRONG_ATTRIBUTE')->shouldReturn(false);
    }

    public function it_support_expected_type(): void
    {
        $this->supportsType(OrderInterface::class)->shouldReturn(true);
    }

    public function it_does_not_support_unexpected_type(): void
    {
        $this->supportsType(OrderItemInterface::class)->shouldReturn(false);
    }

    public function it_abstains_if_does_not_support_attribute(
        TokenInterface $token,
        OrderInterface $order,
    ): void {
        $this->vote($token, $order, ['WRONG_ATTRIBUTE'])->shouldReturn(VoterInterface::ACCESS_ABSTAIN);
    }

    public function it_abstains_if_does_not_support_subject(
        TokenInterface $token,
        OrderItemInterface $orderItem,
    ): void {
        $this->vote($token, $orderItem, ['VENDOR_ORDER_CANCEL'])->shouldReturn(VoterInterface::ACCESS_ABSTAIN);
    }

    public function it_denied_if_cannot_cancel_order(
        TokenInterface $token,
        OrderInterface $order,
        FactoryInterface $stateMachineFactory,
        StateMachineInterface $stateMachine,
        ): void {
        $stateMachineFactory->get($order, OrderTransitions::GRAPH)->willReturn($stateMachine);
        $stateMachine->can(OrderTransitions::TRANSITION_CANCEL)->willReturn(false);

        $this->vote($token, $order, ['VENDOR_ORDER_CANCEL'])->shouldReturn(VoterInterface::ACCESS_DENIED);
    }

    public function it_denied_if_order_not_paid(
        TokenInterface $token,
        OrderInterface $order,
        FactoryInterface $stateMachineFactory,
        StateMachineInterface $stateMachine,
        ): void {
        $stateMachineFactory->get($order, OrderTransitions::GRAPH)->willReturn($stateMachine);
        $stateMachine->can(OrderTransitions::TRANSITION_CANCEL)->willReturn(true);
        $order->getPaymentState()->willReturn(OrderPaymentStates::STATE_AWAITING_PAYMENT);

        $this->vote($token, $order, ['VENDOR_ORDER_CANCEL'])->shouldReturn(VoterInterface::ACCESS_DENIED);
    }

    public function it_granted(
        TokenInterface $token,
        OrderInterface $order,
        FactoryInterface $stateMachineFactory,
        StateMachineInterface $stateMachine,
        ): void {
        $stateMachineFactory->get($order, OrderTransitions::GRAPH)->willReturn($stateMachine);
        $stateMachine->can(OrderTransitions::TRANSITION_CANCEL)->willReturn(true);
        $order->getPaymentState()->willReturn(OrderPaymentStates::STATE_PAID);

        $this->vote($token, $order, ['VENDOR_ORDER_CANCEL'])->shouldReturn(VoterInterface::ACCESS_GRANTED);
    }
}
