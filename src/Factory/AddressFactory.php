<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\Vendor\Entity\Address;
use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use Sylius\Component\Addressing\Model\Country;

final class AddressFactory implements AddressFactoryInterface
{
    public function createAddress(
        string $street,
        string $city,
        string $postalCode,
        Country $country
    ): AddressInterface {
        $address = new Address();
        $address->setCountry($country);
        $address->setPostalCode($postalCode);
        $address->setStreet($street);
        $address->setCity($city);

        return $address;
    }
}
