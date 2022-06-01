<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\ShopUserInterface;

class ProductDraft implements ProductDraftInterface
{
    protected ?int $id;

    protected string $code;

    protected bool $isVerified;

    protected string $status;

    protected ?\DateTimeInterface $verifiedAt;

    protected \DateTimeInterface $createdAt;

    protected int $versionNumber;

    protected Collection $translations;

    protected Collection $productListingPrice;

    protected ProductListing $productListing;

    public function __construct()
    {
        $this->code = '';

        $this->status = ProductDraftInterface::STATUS_CREATED;

        $this->productListingPrice = new ArrayCollection();

        $this->translations = new ArrayCollection();

        $this->isVerified = false;

        $this->createdAt = new \DateTime();

        $this->versionNumber = 1;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): ProductDraft
    {
        $this->id = $id;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): ProductDraft
    {
        $this->code = $code;
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): ProductDraft
    {
        $this->isVerified = $isVerified;
        return $this;
    }

    public function getVerifiedAt(): ?\DateTimeInterface
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): ProductDraft
    {
        $this->verifiedAt = $verifiedAt;
        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): ProductDraft
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getVersionNumber(): int
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(int $versionNumber): ProductDraft
    {
        $this->versionNumber = $versionNumber;
        return $this;
    }

    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslations(ProductTranslation $translation): ProductDraft
    {
        $this->translations->add($translation);
        return $this;
    }

    public function getProductListingPrice(): Collection
    {
        return $this->productListingPrice;
    }

    public function addProductListingPrice(ProductListingPriceInterface $productListingPrice): ProductDraft
    {
        $this->productListingPrice->add($productListingPrice);
        return $this;
    }

    public function getProductListing(): ProductListing
    {
        return $this->productListing;
    }

    public function setProductListing(ProductListing $productListing): ProductDraft
    {
        $this->productListing = $productListing;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): ProductDraft
    {
        $this->status = $status;
        return $this;
    }

    public function newVersion(): ProductDraft
    {
        $this->versionNumber++;
        return $this;
    }

    public function clear(): void
    {
        $this->id = null;

        $this->productListingPrice = new ArrayCollection();

        $this->translations = new ArrayCollection();
    }

    public function addTranslationsWithKey(ProductTranslation $translation, string $key): ProductDraft
    {
        $this->translations->set($key, $translation);
        return $this;
    }

    public function addProductListingPriceWithKey(ProductListingPriceInterface $productListingPrice, string $key): ProductDraft
    {
        $this->productListingPrice->set($key,$productListingPrice);
        return $this;
    }
}
