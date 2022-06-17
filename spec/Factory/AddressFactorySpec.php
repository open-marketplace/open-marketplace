<?php

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\AddressFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Addressing\Model\Country;

final class AddressFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AddressFactory::class);
    }
    function it_return_address()
    {
        $this->createNew()->shouldHaveType(VendorAddressInterface::class);
    }
    function it_returns_valid_address(Country $country)
    {        
        $this->createAddress("some street", "City", "22-111", $country)->shouldHaveType(VendorAddressInterface::class);
    }
}
