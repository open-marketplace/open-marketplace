<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Security\Voter;

use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Security\Voter\VendorAwareVoter;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class VendorAwareVoterSpec extends ObjectBehavior
{
    public function let(
        VendorContextInterface $vendorContext,
    ): void {
        $this->beConstructedWith($vendorContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorAwareVoter::class);
    }

    public function it_does_not_support_wrong_subject(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->shouldNotBeCalled();

        $this->vote($token, $vendor, ['VENDOR_AWARE_OBJECT_CREATE']);
    }

    public function it_does_not_support_wrong_attribute(
        VendorContextInterface $vendorContext,
        VendorAwareInterface $vendorAware,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->shouldNotBeCalled();

        $this->vote($token, $vendorAware, ['WRONG_ATTRIBUTE']);
    }

    public function it_supports_proper_subject_and_attribute(
        VendorContextInterface $vendorContext,
        VendorAwareInterface $vendorAware,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->shouldBeCalled();

        $this->vote($token, $vendorAware, ['VENDOR_AWARE_OBJECT_CREATE']);
    }

    public function it_returns_access_denied_when_current_user_is_not_in_vendor_context(
        VendorContextInterface $vendorContext,
        VendorAwareInterface $vendorAware,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->willReturn(null);
        $vendorContext->getVendor()->shouldBeCalled();

        $this->vote($token, $vendorAware, ['VENDOR_AWARE_OBJECT_CREATE'])->shouldReturn(Voter::ACCESS_DENIED);
    }

    public function it_denied_access_when_current_user_is_not_in_vendor_context(
        VendorContextInterface $vendorContext,
        VendorAwareInterface $vendorAware,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->willReturn(null);
        $vendorContext->getVendor()->shouldBeCalled();

        $this->vote($token, $vendorAware, ['VENDOR_AWARE_OBJECT_CREATE'])->shouldReturn(Voter::ACCESS_DENIED);
    }

    public function it_grant_access_when_current_user_is_in_vendor_context(
        VendorContextInterface $vendorContext,
        VendorAwareInterface $vendorAware,
        VendorInterface $vendor,
        TokenInterface $token
    ): void {
        $vendorContext->getVendor()->willReturn($vendor);
        $vendorContext->getVendor()->shouldBeCalled();

        $this->vote($token, $vendorAware, ['VENDOR_AWARE_OBJECT_CREATE'])->shouldReturn(Voter::ACCESS_GRANTED);
    }
}
