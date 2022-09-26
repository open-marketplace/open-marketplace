<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateImageFactory;
use PhpSpec\ObjectBehavior;

final class VendorProfileUpdateImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorProfileUpdateImageFactory::class);
    }

    public function it_creates_new_vendor_image(): void
    {
        $this->createNew()->shouldBeAnInstanceOf(VendorProfileUpdateImage::class);
    }

    public function it_creates_initialized_image(
        VendorImageInterface $uploadedImage,
        VendorProfileInterface $vendorProfile
    ): void {
        $imageEntity = $this->createWithFileAndOwner($uploadedImage, $vendorProfile);

        $imageEntity->shouldBeAnInstanceOf(VendorProfileUpdateImage::class);
        $imageEntity->shouldImplement(VendorImageInterface::class);
        $imageEntity->getOwner()->shouldBe($vendorProfile);
    }
}
