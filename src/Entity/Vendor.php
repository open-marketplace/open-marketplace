<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Customer\Model\Customer;

class Vendor implements VendorInterface
{
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
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

    public function getVendorAddress(): ?VendorAddress
    {
        return $this->vendorAddress;
    }

    public function setVendorAddress(?VendorAddress $vendorAddress): void
    {
        $this->vendorAddress = $vendorAddress;
    }


    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    private int $id;

    private ?string $companyName;

    private ?string $taxIdentifier;

    private ?string $phoneNumber;

    private ?VendorAddress $vendorAddress;

    private Customer $customer;
}
