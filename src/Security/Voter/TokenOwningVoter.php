<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Security\Voter;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class TokenOwningVoter extends Voter
{
    public const UPDATE = 'UPDATE';

    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, [self::UPDATE])) {
            return false;
        }

        return true;
    }

    /** @phpstan-ignore-next-line */
    protected function voteOnAttribute(
        $attribute,
        $subject,
        TokenInterface $token
    )
    {
        $user = $token->getUser();

        if (!$user instanceof ShopUserInterface || null == $subject) {
            return false;
        }

        /** @var VendorProfileUpdateInterface $vendorUpdateData */
        $vendorUpdateData = $subject;

        switch ($attribute) {
            case self::UPDATE:
                return $this->IOwnThisData($vendorUpdateData, $user);
            default:
                return false;
        }
    }

    private function IOwnThisData(VendorProfileUpdateInterface $profileUpdate, ShopUserInterface $user): bool
    {
        /** @var Customer $customer */
        $customer = $user->getCustomer();
        if (null == $customer) {
            return false;
        }
        $loggedInVendor = $customer->getVendor();
        $vendorData = $profileUpdate->getVendor();
        if ($loggedInVendor === $vendorData) {
            return true;
        }

        return false;
    }
}
