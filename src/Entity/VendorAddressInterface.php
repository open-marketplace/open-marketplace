<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

interface VendorAddressInterface
{
    public function getId(): int;

    public function setId(int $id): void;

    public function getCountry(): string;

    public function setCountry(string $country): void;

    public function getCity(): string;

    public function setCity(string $city): void;

    public function getStreet(): string;

    public function setStreet(string $street): void;

    public function getPostalCode(): string;

    public function setPostalCode(string $postalCode): void;
}