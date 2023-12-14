<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Profile\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImage;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\LogoImageFactory;
use BitBag\OpenMarketplace\Component\Vendor\Profile\Factory\LogoImageFactoryInterface;
use PhpSpec\ObjectBehavior;

final class LogoImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(LogoImageFactory::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(LogoImageFactoryInterface::class);
    }

    public function it_should_create_empty_vendor_image(): void
    {
        $vendorImage = new LogoImage();

        $this->createNew()->shouldBeLike($vendorImage);
    }

    public function it_should_create_vendor_image_with_data(): void
    {
        $vendor = new Vendor();
        $vendorImage = new LogoImage();

        $vendorImage->setPath('test');
        $vendorImage->setOwner($vendor);

        $this->create('test', $vendor)->shouldBeLike($vendorImage);
    }
}
