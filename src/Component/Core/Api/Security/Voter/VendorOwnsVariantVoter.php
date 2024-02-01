<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Security\Voter;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class VendorOwnsVariantVoter extends Voter
{
    public const OWNS_VARIANT = 'OWNS_VARIANT';

    protected function supports(string $attribute, mixed $subject): bool
    {
        if (!in_array($attribute, [self::OWNS_VARIANT])) {
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

        switch ($attribute) {
            case self::OWNS_VARIANT:
                return $this->doesUserOwnTheData($subject, $user);
            default:
                return false;
        }
    }

    private function doesUserOwnTheData(object $data, ShopUserInterface $user): bool
    {
        $loggedInVendor = $user->getVendor();
        /** @phpstan-ignore-next-line */
        $vendorData = $data->getProduct()->getVendor();
        if ($loggedInVendor === $vendorData) {
            return true;
        }

        return false;
    }
}
