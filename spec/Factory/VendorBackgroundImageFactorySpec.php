<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorBackgroundImage;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactory;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactoryInterface;
use PhpSpec\ObjectBehavior;

final class VendorBackgroundImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorBackgroundImageFactory::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(VendorBackgroundImageFactoryInterface::class);
    }

    public function it_should_create_empty_vendor_image(): void
    {
        $vendorImage = new VendorBackgroundImage();

        $this->createNew()->shouldBeLike($vendorImage);
    }

    public function it_should_create_vendor_image_with_data(): void
    {
        $vendor = new Vendor();
        $vendorImage = new VendorBackgroundImage();

        $vendorImage->setPath('test');
        $vendorImage->setOwner($vendor);

        $this->create('test', $vendor)->shouldBeLike($vendorImage);
    }
}
