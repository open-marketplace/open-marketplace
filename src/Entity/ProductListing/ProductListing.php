<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ProductInterface;

class ProductListing implements ProductListingInterface
{
    protected int $id;

    protected ?string $code;

    protected VendorInterface $vendor;

    protected \DateTimeInterface $createdAt;

    protected bool $enabled = true;

    protected ?ProductInterface $product = null;

    /** @var Collection<int, ProductDraftInterface> */
    protected Collection $productDrafts;

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function __construct()
    {
        $this->productDrafts = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
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

    public function getLatestDraft(): ?ProductDraftInterface
    {
        $productDraft = null;
        if (!$this->productDrafts->isEmpty() && false !== $this->productDrafts->last()) {
            /** @var ProductDraftInterface $productDraft */
            $productDraft = $this->productDrafts->last();
        }

        return $productDraft;
    }
}
