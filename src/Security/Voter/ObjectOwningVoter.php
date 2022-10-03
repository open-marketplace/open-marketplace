<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Security\Voter;

use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorProfileUpdateInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class ObjectOwningVoter extends Voter
{
    public const OWNIT = 'OWNIT';

    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, [self::OWNIT])) {
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

        /** @var VendorProfileUpdateInterface $vendorUpdateData */
        $vendorUpdateData = $subject;

        switch ($attribute) {
            case self::OWNIT:
                return $this->doesUserOwnTheData($subject, $user);
            default:
                return false;
        }
    }

    private function doesUserOwnTheData(object $data, ShopUserInterface $user): bool
    {
        $loggedInVendor = $user->getVendor();
        /** @phpstan-ignore-next-line */
        $vendorData = $data->getVendor();
        if ($loggedInVendor === $vendorData) {
            return true;
        }

        return false;
    }
}
