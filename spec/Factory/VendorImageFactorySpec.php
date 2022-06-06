<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorImageFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorImageFactoryInterface;
use PhpSpec\ObjectBehavior;

final class VendorImageFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorImageFactory::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(VendorImageFactoryInterface::class);
    }

    public function it_should_create_empty_vendor_image(): void
    {
        $vendorImage = new VendorImage();

        $this->createNew()->shouldBeLike($vendorImage);
    }

    public function it_should_create_vendor_image_with_data(): void
    {
        $vendor = new Vendor();
        $vendorImage = new VendorImage();

        $vendorImage->setPath('test');
        $vendorImage->setVendor($vendor);

        $this->create('test', $vendor)->shouldBeLike($vendorImage);
    }
}
