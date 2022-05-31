<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class Vendor implements VendorDataInterface, VendorInterface, ResourceInterface
{
    private int $id;

    private Customer $customer;

    private ?string $companyName;

    private ?string $taxIdentifier;

    private ?string $phoneNumber;

    private ?VendorAddress $vendorAddress;

    private ?string $slug;

    private ?string $description;

    /** @return Collection<int, VendorImageInterface> */
    private Collection $images;

    /** @return Collection<int, ProductInterface> */
    private Collection $products;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /** @return Collection<int, VendorImageInterface> */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(VendorImageInterface $vendorImage): void
    {
        if (false === $this->images->contains($vendorImage)) {
            $this->images->add($vendorImage);
            $vendorImage->setVendor($this);
        }
    }

    public function removeImage(VendorImageInterface $vendorImage): void
    {
        if (true === $this->images->contains($vendorImage)) {
            $this->images->removeElement($vendorImage);
        }
    }

    /** @return Collection<int, VendorImageInterface> */
    public function getProducts(): Collection
    {
        return $this->images;
    }

    public function addProduct(ProductInterface $product): void
    {
        if (false === $this->products->contains($product)) {
            $this->products->add($product);
            $product->setVendor($this);
        }
    }

    public function removeProduct(ProductInterface $product): void
    {
        if (true === $this->products->contains($product)) {
            $this->products->removeElement($product);
        }
    }
}
