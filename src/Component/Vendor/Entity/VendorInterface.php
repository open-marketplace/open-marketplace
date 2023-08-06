<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Entity;

use BitBag\OpenMarketplace\Api\UuidAwareInterface;
use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use DateTimeInterface;
use Doctrine\Common\Collections\Collection;

interface VendorInterface extends ProfileInterface, UuidAwareInterface
{
    public const NET_COMMISSION = 'net';

    public const GROSS_COMMISSION = 'gross';

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

    public function getVendorAddress(): ?AddressInterface;

    public function setVendorAddress(?AddressInterface $vendorAddress): void;

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

    public function setImage(?LogoImageInterface $image): void;

    public function removeImage(): void;

    public function getBackgroundImage(): ?BackgroundImageInterface;

    public function setBackgroundImage(?BackgroundImageInterface $backgroundImage): void;

    public function removeBackgroundImage(): void;

    /** @return Collection<int, Listing> */
    public function getProductListings(): Collection;

    /**
     * @param Collection<int, Listing> $productListings
     */
    public function setProductListings(Collection $productListings): void;

    public function isVerified(): bool;

    /** @return Collection<int, VendorShippingMethodInterface> */
    public function getShippingMethods(): Collection;

    public function hasShippingMethod(VendorShippingMethodInterface $shippingMethod): bool;

    public function addShippingMethod(VendorShippingMethodInterface $shippingMethod): void;

    public function removeShippingMethod(VendorShippingMethodInterface $shippingMethod): void;

    public function getCommission(): ?int;

    public function setCommission(?int $commission): void;

    public function getCommissionType(): string;

    public function setCommissionType(string $commissionType): void;
}
