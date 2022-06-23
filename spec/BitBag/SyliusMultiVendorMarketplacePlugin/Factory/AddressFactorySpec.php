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
