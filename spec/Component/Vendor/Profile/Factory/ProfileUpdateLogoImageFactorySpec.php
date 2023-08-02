<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Profile\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate\LogoImage;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileInterface;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\ProfileUpdateLogoImageFactory;
use PhpSpec\ObjectBehavior;

final class ProfileUpdateLogoImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ProfileUpdateLogoImageFactory::class);
    }

    public function it_creates_new_vendor_image(): void
    {
        $this->createNew()->shouldBeAnInstanceOf(LogoImage::class);
    }

    public function it_creates_initialized_image(
        LogoImageInterface $uploadedImage,
        ProfileInterface $vendorProfile
    ): void {
        $imageEntity = $this->createWithFileAndOwner($uploadedImage, $vendorProfile);

        $imageEntity->shouldBeAnInstanceOf(LogoImage::class);
        $imageEntity->shouldImplement(LogoImageInterface::class);
        $imageEntity->getOwner()->shouldBe($vendorProfile);
    }
}
