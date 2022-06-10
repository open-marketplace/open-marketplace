<?php

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorFactory;
use PhpSpec\ObjectBehavior;

final class VendorFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(VendorFactory::class);
    }
    function it_return_vendor()
    {
        $this->createNew()->shouldHaveType(VendorProfileInterface::class);
    }
    function it_returns_valid_address(VendorAddressInterface $vendorAddress)
    {
        $this->createVendor("some street", "City", "22-111", $vendorAddress)->shouldHaveType(VendorProfileInterface::class);
    }
}
