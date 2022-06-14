<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use Doctrine\Common\Collections\Collection;

class Vendor implements VendorInterface
{
    private ?int $id;

    private CustomerInterface $customer;

    private ?string $companyName;

    private ?string $taxIdentifier;

    private ?string $phoneNumber;

    private ?VendorAddressInterface $vendorAddress;

    /** @var Collection<int, ProductListing> */
    private Collection $productListings;

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

    public function getProductListings(): Collection
    {
        return $this->productListings;
    }

    public function setProductListings(Collection $productListings): void
    {
        $this->productListings = $productListings;
    }

    public function addProductListing(ProductListing $productListings): void
    {
        $this->productListings->add($productListings);
    }
}
