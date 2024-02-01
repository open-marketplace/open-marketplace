<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Security\Voter;

use BitBag\OpenMarketplace\Component\Messaging\Entity\ConversationInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

final class ConversationOwningVoter extends Voter
{
    public const UPDATE = 'UPDATE-CONVERSATION';

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::UPDATE])) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(
        string $attribute,
        mixed $subject,
        TokenInterface $token
    ): bool {
        $user = $token->getUser();

        if (null === $user || null === $subject) {
            return false;
        }

        /** @var ConversationInterface $conversation */
        $conversation = $subject;

        switch ($attribute) {
            case self::UPDATE:
                return $this->doesUserOwnConversation($conversation, $user);
            default:
                return false;
        }
    }

    private function doesUserOwnConversation(ConversationInterface $conversation, UserInterface $user): bool
    {
        $conversationUser = $conversation->getApplicant();

        if ($user === $conversationUser ||
            $user instanceof AdminUserInterface) {
            return true;
        }

        return false;
    }
}
