<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity;

use Sylius\Component\Addressing\Model\CountryInterface;

class VendorAddressUpdate implements VendorAddressInterface
{
    protected ?int $id;

    protected ?CountryInterface $country;

    protected ?string $city;

    protected ?string $street;

    protected ?string $postalCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?CountryInterface
    {
        return $this->country;
    }

    public function setCountry(?CountryInterface $country): void
    {
        $this->country = $country;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }
}
