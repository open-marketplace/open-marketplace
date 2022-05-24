<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Addressing\Model\Country;

interface VendorAddressInterface
{
    public function getId(): ?int;

    public function getCountry(): ?Country;

    public function setCountry(?Country $country): void;

    public function getCity(): ?string;

    public function setCity(?string $city): void;

    public function getStreet(): ?string;

    public function setStreet(?string $street): void;

    public function getPostalCode(): ?string;

    public function setPostalCode(?string $postalCode): void;
}
