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
use Prophecy\Call\Call;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\ShopUserInterface;

class ProductDraft implements ProductDraftInterface, \Prophecy\Prediction\PredictionInterface
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

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): void
    {
        $this->isVerified = $isVerified;
    }

    public function getVerifiedAt(): ?\DateTimeInterface
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): void
    {
        $this->verifiedAt = $verifiedAt;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getVersionNumber(): int
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(int $versionNumber): void
    {
        $this->versionNumber = $versionNumber;
    }

    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslations(ProductTranslation $translation): void
    {
        $this->translations->add($translation);
    }

    public function getProductListingPrice(): Collection
    {
        return $this->productListingPrice;
    }

    public function addProductListingPrice(ProductListingPriceInterface $productListingPrice): void
    {
        $this->productListingPrice->add($productListingPrice);
    }

    public function getProductListing(): ProductListing
    {
        return $this->productListing;
    }

    public function setProductListing(ProductListing $productListing): void
    {
        $this->productListing = $productListing;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function newVersion(): void
    {
        $this->versionNumber++;
    }

    public function clear(): void
    {
        $this->id = null;

        $this->productListingPrice = new ArrayCollection();

        $this->translations = new ArrayCollection();
    }

    public function addTranslationsWithKey(ProductTranslation $translation, string $key): void
    {
        $this->translations->set($key, $translation);
    }

    public function addProductListingPriceWithKey(ProductListingPriceInterface $productListingPrice, string $key): void
    {
        $this->productListingPrice->set($key,$productListingPrice);
    }

    public function check(array $calls, ObjectProphecy $object, MethodProphecy $method)
    {
        // TODO: Implement check() method.
    }
}
