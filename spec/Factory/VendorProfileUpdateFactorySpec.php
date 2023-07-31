<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\ProfileUpdateInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorProfileUpdateFactory;
use BitBag\OpenMarketplace\Generator\TokenGeneratorInterface;
use PhpSpec\ObjectBehavior;

final class VendorProfileUpdateFactorySpec extends ObjectBehavior
{
    public function let(TokenGeneratorInterface $tokenGenerator): void
    {
        $this->beConstructedWith($tokenGenerator);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorProfileUpdateFactory::class);
    }

    public function it_creates_vendor_profile_update(
        TokenGeneratorInterface $tokenGenerator,
        VendorInterface $vendor
    ): void {
        $tokenGenerator->generate()->willReturn('test_token');
        $this->createWithGeneratedTokenAndVendor($vendor)->shouldHaveType(ProfileUpdateInterface::class);
    }

    public function it_creates_vendor_profile_update_with_valid_token(
        TokenGeneratorInterface $tokenGenerator,
        VendorInterface $vendor
    ): void {
        $tokenGenerator->generate()->willReturn('test_token');
        $this->createWithGeneratedTokenAndVendor($vendor)->getToken()->shouldBeEqualTo('test_token');
    }
}
