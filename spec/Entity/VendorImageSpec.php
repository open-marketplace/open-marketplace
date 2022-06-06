<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;

final class VendorImageSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorImage::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(VendorImageInterface::class);
    }

    public function it_gets_path(): void
    {
        $this->setPath('test');

        $this->getPath()->shouldReturn('test');
    }

    public function it_gets_vendor(VendorInterface $vendor): void
    {
        $this->setVendor($vendor);

        $this->getVendor()->shouldReturn($vendor);
    }
}
