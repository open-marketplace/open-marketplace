<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Entity;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\Listing;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\UuidInterface;

class Vendor implements VendorInterface
{
    protected ?int $id;

    protected ?UuidInterface $uuid = null;

    protected ShopUserInterface $shopUser;

    protected ?string $companyName = null;

    protected ?string $taxIdentifier;

    protected ?string $phoneNumber;

    protected ?AddressInterface $vendorAddress;

    protected string $status = self::STATUS_UNVERIFIED;

    protected bool $enabled = true;

    protected ?DateTimeInterface $editedAt = null;

    protected ?string $slug;

    protected ?string $description;

    protected ?LogoImageInterface $image = null;

    protected ?BackgroundImageInterface $backgroundImage = null;

    /** @var Collection<int, ProductInterface> */
    protected Collection $products;

    /** @var Collection<int, Listing> */
    protected Collection $productListings;

    /** @var Collection<int, VendorShippingMethodInterface> */
    protected Collection $shippingMethods;

    protected ?int $commission = 0;

    protected string $commissionType = self::NET_COMMISSION;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->shippingMethods = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUuid(): ?UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(?UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
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

    public function getVendorAddress(): ?AddressInterface
    {
        return $this->vendorAddress;
    }

    public function setVendorAddress(?AddressInterface $vendorAddress): void
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

    public function addProductListing(Listing $productListings): void
    {
        $this->productListings->add($productListings);
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

    /** @return Collection<int, ProductInterface> */
    public function getProducts(): Collection
    {
        return $this->products;
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

    public function getImage(): ?LogoImageInterface
    {
        return $this->image;
    }

    public function setImage(?LogoImageInterface $image): void
    {
        $this->image = $image;
    }

    public function removeImage(): void
    {
        $this->image = null;
    }

    public function getBackgroundImage(): ?BackgroundImageInterface
    {
        return $this->backgroundImage;
    }

    public function setBackgroundImage(?BackgroundImageInterface $backgroundImage): void
    {
        $this->backgroundImage = $backgroundImage;
    }

    public function removeBackgroundImage(): void
    {
        $this->backgroundImage = null;
    }

    public function isVerified(): bool
    {
        return self::STATUS_VERIFIED === $this->getStatus();
    }

    /** @return Collection<int, VendorShippingMethodInterface> */
    public function getShippingMethods(): Collection
    {
        return $this->shippingMethods;
    }

    public function hasShippingMethod(VendorShippingMethodInterface $shippingMethod): bool
    {
        return $this->shippingMethods->contains($shippingMethod);
    }

    public function addShippingMethod(VendorShippingMethodInterface $shippingMethod): void
    {
        if (!$this->hasShippingMethod($shippingMethod)) {
            $this->shippingMethods->add($shippingMethod);
        }
    }

    public function removeShippingMethod(VendorShippingMethodInterface $shippingMethod): void
    {
        if ($this->hasShippingMethod($shippingMethod)) {
            $this->shippingMethods->removeElement($shippingMethod);
        }
    }

    public function getAverageRatingData(): array
    {
        $ratingSum = 0.0;
        $productsRated = 0;
        $reviewsCount = 0;
        /** @var ProductInterface $product */
        foreach ($this->products as $product) {
            if (0 < count($product->getAcceptedReviews())) {
                $ratingSum += $product->getAverageRating();
                $productsRated += 1;
                $reviewsCount += count($product->getAcceptedReviews());
            }
        }

        if (0 === $productsRated) {
            return [
                'averageRating' => 0.0,
                'reviewsCount' => 0,
            ];
        }

        return [
            'averageRating' => $ratingSum / $productsRated,
            'reviewsCount' => $reviewsCount,
            ];
    }

    public function getCommission(): ?int
    {
        return $this->commission;
    }

    public function setCommission(?int $commission): void
    {
        $this->commission = $commission;
    }

    public function getCommissionType(): string
    {
        return $this->commissionType;
    }

    public function setCommissionType(string $commissionType): void
    {
        $this->commissionType = $commissionType;
    }

    public function __toString(): string
    {
        /**  @phpstan-ignore-next-line */
        return $this->getCompanyName();
    }
}
