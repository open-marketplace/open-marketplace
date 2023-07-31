<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Security\Voter;

use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\Security\Voter\TranslatableVendorAwareVoter;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslationInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class TranslatableVendorAwareVoterSpec extends ObjectBehavior
{
    public function let(
        VendorContextInterface $vendorContext,
    ): void {
        $this->beConstructedWith($vendorContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(TranslatableVendorAwareVoter::class);
    }

    public function it_does_not_support_wrong_subject(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->shouldNotBeCalled();

        $this->vote($token, $vendor, ['TRANSLATABLE_VENDOR_AWARE_OBJECT_UPDATE']);
    }

    public function it_does_not_support_wrong_attribute(
        VendorContextInterface $vendorContext,
        TranslationInterface $translation,
        VendorAwareInterface $vendorAware,
        TokenInterface $token
    ): void {
        $vendorAware->implement(TranslatableInterface::class);
        $translation->getTranslatable()->willReturn($vendorAware);
        $vendorContext->getVendor()->shouldNotBeCalled();

        $this->vote($token, $translation, ['WRONG_ATTRIBUTE']);
    }

    public function it_supports_proper_subject_and_attribute(
        VendorContextInterface $vendorContext,
        TranslationInterface $translation,
        VendorAwareInterface $vendorAware,
        VendorInterface $vendor,
        TokenInterface $token
    ): void {
        $vendorAware->implement(TranslatableInterface::class);
        $vendorAware->getVendor()->willReturn($vendor);

        $translation->getTranslatable()->willReturn($vendorAware);

        $vendorContext->getVendor()->willReturn($vendor);
        $vendorContext->getVendor()->shouldBeCalled();

        $this->vote($token, $translation, ['TRANSLATABLE_VENDOR_AWARE_OBJECT_UPDATE']);
    }

    public function it_denied_access_when_current_user_is_not_in_vendor_context(
        VendorContextInterface $vendorContext,
        TranslationInterface $translation,
        VendorAwareInterface $vendorAware,
        TokenInterface $token
    ): void {
        $vendorAware->implement(TranslatableInterface::class);

        $translation->getTranslatable()->willReturn($vendorAware);
        $vendorContext->getVendor()->willReturn(null);

        $vendorContext->getVendor()->shouldBeCalled();
        $translation->getTranslatable()->shouldBeCalled();

        $this->vote($token, $translation, ['TRANSLATABLE_VENDOR_AWARE_OBJECT_UPDATE'])->shouldReturn(Voter::ACCESS_DENIED);
    }

    public function it_denied_access_when_current_user_is_in_wrong_vendor_context(
        VendorContextInterface $vendorContext,
        TranslationInterface $translation,
        VendorAwareInterface $vendorAware,
        VendorInterface $vendor,
        VendorInterface $otherVendor,
        TokenInterface $token
    ): void {
        $vendorAware->implement(TranslatableInterface::class);

        $vendor->getId()->willReturn(1);
        $vendorAware->getVendor()->willReturn($vendor);
        $translation->getTranslatable()->willReturn($vendorAware);

        $otherVendor->getId()->willReturn(2);
        $vendorContext->getVendor()->willReturn($otherVendor);

        $vendorContext->getVendor()->shouldBeCalled();
        $translation->getTranslatable()->shouldBeCalled();

        $this->vote($token, $translation, ['TRANSLATABLE_VENDOR_AWARE_OBJECT_UPDATE'])->shouldReturn(Voter::ACCESS_DENIED);
    }

    public function it_grant_access_when_current_user_is_in_same_vendor_context(
        VendorContextInterface $vendorContext,
        TranslationInterface $translation,
        VendorAwareInterface $vendorAware,
        VendorInterface $vendor,
        TokenInterface $token
    ): void {
        $vendorAware->implement(TranslatableInterface::class);

        $vendor->getId()->willReturn(1);
        $vendorAware->getVendor()->willReturn($vendor);
        $translation->getTranslatable()->willReturn($vendorAware);

        $vendorContext->getVendor()->willReturn($vendor);

        $vendorContext->getVendor()->shouldBeCalled();
        $translation->getTranslatable()->shouldBeCalled();

        $this->vote($token, $translation, ['TRANSLATABLE_VENDOR_AWARE_OBJECT_UPDATE'])->shouldReturn(Voter::ACCESS_GRANTED);
    }
}
