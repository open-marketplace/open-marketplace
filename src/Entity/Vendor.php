<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

class Vendor implements VendorProfileInterface, VendorInterface, ResourceInterface
{
    protected ?int $id;

    protected CustomerInterface $customer;

    protected ?string $companyName;

    protected ?string $taxIdentifier;

    protected ?string $phoneNumber;

    protected ?VendorAddressInterface $vendorAddress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getVendorAddress(): ?VendorAddressInterface
    {
        return $this->vendorAddress;
    }

    public function setVendorAddress(?VendorAddressInterface $vendorAddress): void
    {
        $this->vendorAddress = $vendorAddress;
    }

    public function getCustomer(): CustomerInterface
    {
        return $this->customer;
    }

    public function setCustomer(CustomerInterface $customer): void
    {
        $this->customer = $customer;
    }
}
