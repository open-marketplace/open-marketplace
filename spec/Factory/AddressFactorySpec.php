<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use BitBag\OpenMarketplace\Factory\AddressFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Addressing\Model\Country;

final class AddressFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AddressFactory::class);
    }

    public function it_returns_valid_address(Country $country): void
    {
        $address = $this->createAddress('some street', 'City', '22-111', $country);
        $address->getCountry()->shouldBeEqualTo($country);
        $address->shouldHaveType(AddressInterface::class);
        $address->getStreet()->shouldBeEqualTo('some street');
        $address->getCity()->shouldBeEqualTo('City');
        $address->getPostalCode()->shouldBeEqualTo('22-111');
    }
}
