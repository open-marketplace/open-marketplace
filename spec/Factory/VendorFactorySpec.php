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
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorFactory;
use PhpSpec\ObjectBehavior;

final class VendorFactorySpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorFactory::class);
    }

    function it_return_vendor(): void
    {
        $this->createNew()->shouldHaveType(VendorProfileInterface::class);
    }

    function it_returns_valid_address(VendorAddressInterface $vendorAddress): void
    {
        $this->createVendor("some street", "City", "22-111", $vendorAddress)->shouldHaveType(VendorProfileInterface::class);
    }
}
