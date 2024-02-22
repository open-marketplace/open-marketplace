<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\Security\Voter;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class TokenOwningVoter extends Voter
{
    public const UPDATE = 'UPDATE';

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
        if (!$user instanceof ShopUserInterface || null == $subject) {
            return false;
        }

        /** @var ProfileUpdateInterface $vendorUpdateData */
        $vendorUpdateData = $subject;

        switch ($attribute) {
            case self::UPDATE:
                return $this->doesUserOwnTheData($vendorUpdateData, $user);
            default:
                return false;
        }
    }

    private function doesUserOwnTheData(ProfileUpdateInterface $profileUpdate, ShopUserInterface $user): bool
    {
        $loggedInVendor = $user->getVendor();
        $vendorData = $profileUpdate->getVendor();
        if ($loggedInVendor === $vendorData) {
            return true;
        }

        return false;
    }
}
