<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\TokenGeneratorInterface;
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
        $this->createWithGeneratedTokenAndVendor($vendor)->shouldHaveType(VendorProfileUpdateInterface::class);
    }

    public function it_creates_vendor_profile_update_with_valid_token(
        TokenGeneratorInterface $tokenGenerator,
        VendorInterface $vendor
    ): void {
        $tokenGenerator->generate()->willReturn('test_token');
        $this->createWithGeneratedTokenAndVendor($vendor)->getToken()->shouldBeEqualTo('test_token');
    }
}
