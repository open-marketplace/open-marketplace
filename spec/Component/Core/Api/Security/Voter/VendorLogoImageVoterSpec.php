<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Security\Voter;

use BitBag\OpenMarketplace\Component\Core\Api\Security\Voter\VendorLogoImageVoter;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

final class VendorLogoImageVoterSpec extends ObjectBehavior
{
    public function let(
        UserContextInterface $userContext
    ): void {
        $this->beConstructedWith($userContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorLogoImageVoter::class);
    }

    public function it_grants_access_when_current_vendor_is_image_owner_during_delete_action(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        LogoImageInterface $vendorImage,
        TokenInterface $token
    ): void {
        $user->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($user);
        $vendor->getId()->willReturn(1);
        $vendorImage->getOwner()->willReturn($vendor);

        $this->vote($token, $vendorImage, [VendorLogoImageVoter::DELETE])
            ->shouldReturn(VoterInterface::ACCESS_GRANTED);
    }

    public function it_denies_access_when_current_vendor_is_not_image_owner_during_delete_action(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorInterface $imageOwner,
        LogoImageInterface $vendorImage,
        TokenInterface $token
    ): void {
        $user->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($user);
        $vendor->getId()->willReturn(1);
        $imageOwner->getId()->willReturn(2);
        $vendorImage->getOwner()->willReturn($imageOwner);

        $this->vote($token, $vendorImage, [VendorLogoImageVoter::DELETE])
            ->shouldReturn(VoterInterface::ACCESS_DENIED);
    }

    public function it_denies_access_when_current_user_is_not_in_vendor_context_during_delete_action(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        LogoImageInterface $vendorImage,
        TokenInterface $token
    ): void {
        $user->getVendor()->willReturn(null);
        $userContext->getUser()->willReturn($user);
        $vendor->getId()->willReturn(1);
        $vendorImage->getOwner()->willReturn($vendor);

        $this->vote($token, $vendorImage, [VendorLogoImageVoter::DELETE])
            ->shouldReturn(VoterInterface::ACCESS_DENIED);
    }

    public function it_abstains_when_there_is_different_action(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        LogoImageInterface $vendorImage,
        TokenInterface $token
    ): void {
        $user->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($user);
        $vendor->getId()->willReturn(1);
        $vendorImage->getOwner()->willReturn($vendor);

        $this->vote($token, $vendorImage, ['OTHER_ACTION'])
            ->shouldReturn(VoterInterface::ACCESS_ABSTAIN);
    }

    public function it_abstains_when_subject_is_not_vendor_image(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        LogoImageInterface $vendorImage,
        TokenInterface $token
    ): void {
        $user->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($user);
        $vendor->getId()->willReturn(1);
        $vendorImage->getOwner()->willReturn($vendor);

        $this->vote($token, $vendor, [VendorLogoImageVoter::DELETE])
            ->shouldReturn(VoterInterface::ACCESS_ABSTAIN);
    }
}
