<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Security\Voter;

use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;
use Sylius\Component\Resource\Model\TranslationInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class TranslatableVendorAwareVoter extends Voter
{
    private array $supportedAttributes = [
        'TRANSLATABLE_VENDOR_AWARE_OBJECT_CREATE',
        'TRANSLATABLE_VENDOR_AWARE_OBJECT_READ',
        'TRANSLATABLE_VENDOR_AWARE_OBJECT_UPDATE',
        'TRANSLATABLE_VENDOR_AWARE_OBJECT_DELETE',
    ];

    public function __construct(
        private VendorContextInterface $vendorContext
    ) {

    }

    /** @param TranslationInterface $subject */
    protected function supports(string $attribute, $subject): bool
    {
        if (!in_array($attribute, $this->supportedAttributes)) {
            return false;
        }

        if (!$subject instanceof TranslationInterface) {
            return false;
        }

        return $subject->getTranslatable() instanceof VendorAwareInterface;
    }

    /**
     * @param TranslationInterface $subject
     */
    protected function voteOnAttribute(
        string $attribute,
        $subject,
        TokenInterface $token
    ): bool {
        if (!in_array($attribute, $this->supportedAttributes)) {
            return true;
        }

        $translatable = $subject->getTranslatable();
        if (!$translatable instanceof VendorAwareInterface) {
            return true;
        }

        $vendor = $this->vendorContext->getVendor();
        if (null === $vendor) {
            return false;
        }

        /** @var VendorInterface $translatableOwner */
        $translatableOwner = $translatable->getVendor();

        return $translatableOwner->getId() === $vendor->getId();
    }
}
