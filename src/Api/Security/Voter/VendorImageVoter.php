<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Security\Voter;

use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class VendorImageVoter extends Voter
{
    public const DELETE = 'VENDOR_IMAGE_DELETE';

    private UserContextInterface $userContext;

    public function __construct(UserContextInterface $userContext)
    {
        $this->userContext = $userContext;
    }

    protected function supports(string $attribute, $subject): bool
    {
        if (!in_array($attribute, [self::DELETE])) {
            return false;
        }

        if (!$subject instanceof VendorImageInterface) {
            return false;
        }

        return true;
    }

    /**
     * @param VendorImageInterface $subject
     */
    protected function voteOnAttribute(
        string $attribute,
        $subject,
        TokenInterface $token
    ): bool {
        if (self::DELETE === $attribute) {
            return $this->voteOnDelete($attribute, $subject);
        }

        return true;
    }

    private function voteOnDelete(string $attribute, VendorImageInterface $subject): bool
    {
        $currentVendor = $this->getCurrentVendor();
        /** @var ?VendorInterface $subjectOwner */
        $subjectOwner = $subject->getOwner();

        if (null === $currentVendor || null === $subjectOwner) {
            return false;
        }

        if ($currentVendor->getId() !== $subjectOwner->getId()) {
            return false;
        }

        return true;
    }

    private function getCurrentVendor(): ?VendorInterface
    {
        $shopUser = $this->userContext->getUser();
        if (!$shopUser instanceof ShopUserInterface) {
            return null;
        }

        return $shopUser->getVendor();
    }
}
