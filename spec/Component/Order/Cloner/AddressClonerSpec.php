<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Order\Cloner;

use BitBag\OpenMarketplace\Component\Order\Cloner\AddressCloner;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\AddressInterface;

final class AddressClonerSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AddressCloner::class);
    }

    public function it_clones_values(
        AddressInterface $originalAddress,
        AddressInterface $newAddress,
    ): void {
        $dateTime = new \DateTime('now');
        $originalAddress->getCreatedAt()->willReturn($dateTime);
        $originalAddress->getFirstName()->willReturn('firsName');
        $originalAddress->getLastName()->willReturn('lastName');
        $originalAddress->getCity()->willReturn('city');
        $originalAddress->getStreet()->willReturn('street');
        $originalAddress->getCompany()->willReturn('company name');
        $originalAddress->getPostcode()->willReturn('11-122');
        $originalAddress->getCountryCode()->willReturn('US');
        $originalAddress->getProvinceCode()->willReturn('code');
        $originalAddress->getProvinceName()->willReturn('provinceName');

        $this->clone($originalAddress, $newAddress);

        $newAddress->setCreatedAt($dateTime)->shouldHaveBeenCalledTimes(1);
        $newAddress->setFirstName('firsName')->shouldHaveBeenCalledTimes(1);
        $newAddress->setLastName('lastName')->shouldHaveBeenCalledTimes(1);
        $newAddress->setCity('city')->shouldHaveBeenCalledTimes(1);
        $newAddress->setStreet('street')->shouldHaveBeenCalledTimes(1);
        $newAddress->setCompany('company name')->shouldHaveBeenCalledTimes(1);
        $newAddress->setPostcode('11-122')->shouldHaveBeenCalledTimes(1);
        $newAddress->setCountryCode('US')->shouldHaveBeenCalledTimes(1);
        $newAddress->setProvinceCode('code')->shouldHaveBeenCalledTimes(1);
        $newAddress->setProvinceName('provinceName')->shouldHaveBeenCalledTimes(1);
    }
}
