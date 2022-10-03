<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Security\Voter;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Conversation\ConversationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class ConversationOwningVoter extends Voter
{
    public const UPDATE = 'UPDATE-CONVERSATION';

    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, [self::UPDATE])) {
            return false;
        }

        return true;
    }

    /*
     * This method call is ignored because phpstan force us to type hint arguments but this method in symfony 4.4
     * is declared without so type hinted arguments cause trouble
     */

    /** @phpstan-ignore-next-line */
    protected function voteOnAttribute(
        $attribute,
        $subject,
        TokenInterface $token
    ) {
        $user = $token->getUser();

        if (!$user instanceof ShopUserInterface || null == $subject) {
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

    private function doesUserOwnConversation(ConversationInterface $conversation, ShopUserInterface $user): bool
    {
        $conversationUser = $conversation->getApplicant();
        if ($user === $conversationUser ||
            $user instanceof AdminUserInterface ) {
            return true;
        }

        return false;
    }
}

