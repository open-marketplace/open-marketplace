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

    protected function supports($attribute, $subject)
    {
        if (self::OWNS_VARIANT !== $attribute) {
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
        if (!$user instanceof ShopUserInterface || null === $subject) {
            return false;
        }

        return match ($attribute) {
            self::OWNS_VARIANT => $this->doesUserOwnTheData($subject, $user),
            default => false,
        };
    }

    private function doesUserOwnTheData(object $data, ShopUserInterface $user): bool
    {
        $loggedInVendor = $user->getVendor();
        /** @phpstan-ignore-next-line */
        $vendorData = $data->getProduct()->getVendor();

        return $loggedInVendor === $vendorData;
    }
}
