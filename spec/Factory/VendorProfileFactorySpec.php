<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileFactory;
use PhpSpec\ObjectBehavior;

final class VendorProfileFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorProfileFactory::class);
    }

    public function it_returns_vendor(): void
    {
        $this->createNew()->shouldHaveType(VendorProfileInterface::class);
    }

    public function it_returns_valid_address(VendorAddressInterface $vendorAddress): void
    {
        $this->createVendor('some street', 'City', '22-111', $vendorAddress)->shouldHaveType(VendorProfileInterface::class);
        $this->createVendor('some street', 'City', '22-111', $vendorAddress)->getVendorAddress()->shouldBeEqualTo($vendorAddress);
    }
}
