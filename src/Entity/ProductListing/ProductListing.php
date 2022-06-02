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

use Sylius\Component\Product\Model\ProductInterface;

class ProductListing implements ProductListingInterface, \Prophecy\Prediction\PredictionInterface
{
    protected int $id;

    protected ?string $code;

//todo: refactor to VendorInterface
    protected ShopUserInterface $vendor;

    protected \DateTimeInterface $createAt;

    protected ?\DateTimeInterface $verifiedAt;

    protected ?int $versionNumber;

    protected ?ProductInterface $product;

    protected Collection $productDrafts;

    public function __construct()
    {
        $this->productDrafts = new ArrayCollection();
        $this->createAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProductListing
    {
        $this->id = $id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getVendor(): ShopUserInterface
    {
        return $this->vendor;
    }

    public function setVendor(ShopUserInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): void
    {
        $this->createAt = $createAt;
    }

    public function getVerifiedAt(): ?\DateTimeInterface
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): void
    {
        $this->verifiedAt = $verifiedAt;
    }

    public function getVersionNumber(): ?int
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(?int $versionNumber): void
    {
        $this->versionNumber = $versionNumber;
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    public function setProduct(?ProductInterface $product): void
    {
        $this->product = $product;
    }

    public function getProductDrafts(): Collection
    {
        return $this->productDrafts;
    }

    public function addProductDrafts(ProductDraftInterface $productDrafts): void
    {
        $this->productDrafts->add($productDrafts);
    }

    public function check(array $calls, ObjectProphecy $object, MethodProphecy $method)
    {
        // TODO: Implement check() method.
    }
}
