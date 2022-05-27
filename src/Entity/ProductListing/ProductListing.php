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

use Sylius\Component\Product\Model\ProductInterface;

class ProductListing implements ProductListingInterface
{
    protected int $id;

    protected ?string $code;

//todo: refactor to VendorInterface
    protected ShopUserInterface $vendor;

    protected \DateTimeInterface $publishedAt;

    protected ?\DateTimeInterface $verifiedAt;

    protected ?int $versionNumber;

    protected ?ProductInterface $product;

    protected Collection $productDrafts;

    public function __construct()
    {
        $this->productDrafts = new ArrayCollection();
        $this->publishedAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProductListing
    {
        $this->id = $id;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): ProductListingInterface
    {
        $this->code = $code;
        return $this;
    }

    public function getVendor(): ShopUserInterface
    {
        return $this->vendor;
    }

    public function setVendor(ShopUserInterface $vendor): ProductListingInterface
    {
        $this->vendor = $vendor;
        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt): ProductListingInterface
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    public function getVerifiedAt(): ?\DateTimeInterface
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): ProductListingInterface
    {
        $this->verifiedAt = $verifiedAt;
        return $this;
    }

    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(?int $versionNumber): ProductListingInterface
    {
        $this->versionNumber = $versionNumber;
        return $this;
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    public function setProduct(?ProductInterface $product): ProductListingInterface
    {
        $this->product = $product;
        return $this;
    }

    public function getProductDrafts(): Collection
    {
        return $this->productDrafts;
    }

    public function addProductDrafts($productDrafts): ProductListingInterface
    {
        $this->productDrafts->add($productDrafts);
        return $this;
    }
}
