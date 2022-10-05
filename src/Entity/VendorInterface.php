<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductListing;
use DateTimeInterface;
use Doctrine\Common\Collections\Collection;

interface VendorInterface extends VendorProfileInterface
{
    public const STATUS_UNVERIFIED = 'unverified';

    public const STATUS_VERIFIED = 'verified';

    public function getId(): ?int;

    public function setId(?int $id): void;

    public function getCompanyName(): ?string;

    public function setCompanyName(?string $companyName): void;

    public function getTaxIdentifier(): ?string;

    public function setTaxIdentifier(?string $taxIdentifier): void;

    public function getPhoneNumber(): ?string;

    public function setPhoneNumber(?string $phoneNumber): void;

    public function getVendorAddress(): ?VendorAddressInterface;

    public function setVendorAddress(?VendorAddressInterface $vendorAddress): void;

    public function getShopUser(): ShopUserInterface;

    public function setShopUser(ShopUserInterface $user): void;

    public function getStatus(): string;

    public function setStatus(string $status): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;

    public function getEditedAt(): ?DateTimeInterface;

    public function setEditedAt(?DateTimeInterface $editedAt): void;

    public function getSlug(): ?string;

    public function setSlug(?string $slug): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

    /** @return Collection<int, ProductInterface> */
    public function getProducts(): Collection;

    public function addProduct(ProductInterface $product): void;

    public function removeProduct(ProductInterface $product): void;

    public function setImage(?VendorImageInterface $image): void;

    public function removeImage(): void;

    /** @return Collection<int, ProductListing> */
    public function getProductListings(): Collection;

    /**
     * @param Collection<int, ProductListing> $productListings
     */
    public function setProductListings(Collection $productListings): void;

    public function isVerified(): bool;

    /** @return Collection<int, VendorShippingMethodInterface> */
    public function getShippingMethods(): Collection;

    public function hasShippingMethod(VendorShippingMethodInterface $shippingMethod): bool;

    public function addShippingMethod(VendorShippingMethodInterface $shippingMethod): void;

    public function removeShippingMethod(VendorShippingMethodInterface $shippingMethod): void;
}
