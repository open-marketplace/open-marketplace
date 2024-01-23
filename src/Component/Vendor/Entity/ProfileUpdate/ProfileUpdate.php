<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Entity\ProfileUpdate;

use BitBag\OpenMarketplace\Component\Vendor\Entity\AddressInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\BackgroundImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\LogoImageInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;

class ProfileUpdate implements ProfileUpdateInterface
{
    protected int $id;

    protected VendorInterface $vendor;

    protected ?string $companyName;

    protected ?string $taxIdentifier;

    protected ?string $bankAccountNumber;

    protected ?string $phoneNumber;

    protected ?AddressInterface $vendorAddress;

    protected ?string $token;

    protected ?LogoImageInterface $image = null;

    protected ?BackgroundImageInterface $backgroundImage = null;

    protected ?string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getTaxIdentifier(): ?string
    {
        return $this->taxIdentifier;
    }

    public function setTaxIdentifier(?string $taxIdentifier): void
    {
        $this->taxIdentifier = $taxIdentifier;
    }

    public function getBankAccountNumber(): ?string
    {
        return $this->bankAccountNumber;
    }

    public function setBankAccountNumber(?string $bankAccountNumber): void
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getVendorAddress(): ?AddressInterface
    {
        return $this->vendorAddress;
    }

    public function setVendorAddress(?AddressInterface $vendorAddress): void
    {
        $this->vendorAddress = $vendorAddress;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): ?LogoImageInterface
    {
        return $this->image;
    }

    public function setImage(?LogoImageInterface $image): void
    {
        $this->image = $image;
    }

    public function getBackgroundImage(): ?BackgroundImageInterface
    {
        return $this->backgroundImage;
    }

    public function setBackgroundImage(?BackgroundImageInterface $backgroundImage): void
    {
        $this->backgroundImage = $backgroundImage;
    }
}
