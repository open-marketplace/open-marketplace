<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Security\Voter;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Sylius\Component\User\Model\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class TokenOwningVoter extends Voter
{
    // these strings are just invented: you can use anything
    const UPDATE = 'UPDATE';


    protected function supports($attribute, $subject)
    {
//         if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::UPDATE])) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof User || null == $subject)        
            return false;       
                
        /** @var VendorProfileUpdateInterface $vendorUpdateData */
        $vendorUpdateData = $subject;

        switch ($attribute) {            
            case self::UPDATE:
                return $this->IOwnThisData($vendorUpdateData, $user);
            default:
                return false;
        }        
    }
    private function IOwnThisData(VendorProfileUpdateInterface $profileUpdate, User $user): bool
    {
        $loggedInVendor = $user->getCustomer()->getVendor();
        $vendorData = $profileUpdate->getVendor();
        if ($loggedInVendor == $vendorData)
            return true;
        return false;
    }
}
