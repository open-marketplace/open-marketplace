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
use DateTimeInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

class Vendor implements VendorProfileInterface, VendorInterface, ResourceInterface
{
    protected ?int $id;

    protected ShopUserInterface $shopUser;

    protected ?string $companyName;

    protected ?string $taxIdentifier;

    protected ?string $phoneNumber;

    protected ?VendorAddressInterface $vendorAddress;

    protected string $status = self::STATUS_UNVERIFIED;

    protected bool $enabled = true;

    protected ?DateTimeInterface $editedAt = null;

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

    public function getShopUser(): ShopUserInterface
    {
        return $this->shopUser;
    }

    public function setShopUser(ShopUserInterface $user): void
    {
        $this->shopUser = $user;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getEditedAt(): ?DateTimeInterface
    {
        return $this->editedAt;
    }

    public function setEditedAt(?DateTimeInterface $editedAt): void
    {
        $this->editedAt = $editedAt;
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
