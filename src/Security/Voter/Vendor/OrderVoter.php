<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Security\Voter\Vendor;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use SM\Factory\FactoryInterface;
use Sylius\Component\Core\OrderPaymentStates;
use Sylius\Component\Order\OrderTransitions;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class OrderVoter extends Voter
{
    public const PREFIX = 'VENDOR_ORDER_';

    public const CANCEL = self::PREFIX . 'CANCEL';

    private FactoryInterface $stateMachineFactory;

    public function __construct(FactoryInterface $stateMachineFactory)
    {
        $this->stateMachineFactory = $stateMachineFactory;
    }

    public function supportsAttribute(string $attribute): bool
    {
        return str_starts_with($attribute, self::PREFIX);
    }

    public function supportsType(string $subjectType): bool
    {
        return is_a($subjectType, OrderInterface::class, true);
    }

    protected function supports(string $attribute, $subject): bool
    {
        if (self::CANCEL === $attribute && $subject instanceof OrderInterface) {
            return true;
        }

        return false;
    }

    protected function voteOnAttribute(
        string $attribute,
        $subject,
        TokenInterface $token
    ): bool {
        return match ($attribute) {
            self::CANCEL => $this->canCancel($subject),
            default => throw new \LogicException(sprintf('Unsupported attribute: "%s"', $attribute))
        };
    }

    private function canCancel(OrderInterface $order): bool
    {
        $stateMachine = $this->stateMachineFactory->get($order, OrderTransitions::GRAPH);

        return $stateMachine->can(OrderTransitions::TRANSITION_CANCEL)
            && OrderPaymentStates::STATE_PAID === $order->getPaymentState();
    }
}
