<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity\ProductListing;

use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ProductListing implements ProductListingInterface
{
    protected int $id;

    protected ?string $code;

    protected bool $enabled = true;

    protected bool $removed = false;

    protected string $verificationStatus = ProductDraftInterface::STATUS_CREATED;

    protected VendorInterface $vendor;

    /** @var Collection<int, ProductDraftInterface> */
    protected Collection $productDrafts;

    protected ?ProductInterface $product = null;

    protected ?DateTimeInterface $publishedAt = null;

    protected ?DateTimeInterface $lastVerifiedAt = null;

    protected DateTimeInterface $createdAt;

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

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function isRemoved(): bool
    {
        return $this->removed;
    }

    public function setRemoved(bool $removed): void
    {
        $this->removed = $removed;
    }

    public function getVerificationStatus(): string
    {
        return $this->verificationStatus;
    }

    public function setVerificationStatus(string $verificationStatus): void
    {
        $this->verificationStatus = $verificationStatus;
    }

    public function getVendor(): VendorInterface
    {
        return $this->vendor;
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function getProductDrafts(): Collection
    {
        return $this->productDrafts;
    }

    public function addProductDrafts(ProductDraftInterface $productDrafts): void
    {
        $this->productDrafts->add($productDrafts);
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    public function setProduct(?ProductInterface $product): void
    {
        $this->product = $product;
    }

    public function getPublishedAt(): ?DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(DateTimeInterface $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    public function getLastVerifiedAt(): ?DateTimeInterface
    {
        return $this->lastVerifiedAt;
    }

    public function setLastVerifiedAt(DateTimeInterface $lastVerifiedAt): void
    {
        $this->lastVerifiedAt = $lastVerifiedAt;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getAnyTranslationName(): ?string
    {
        /** @var ProductDraftInterface $latestDraft */
        $latestDraft = $this->getLatestDraft();

        return $latestDraft->getAnyTranslationName();
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

    public function sendToVerification(ProductDraftInterface $productDraft): void
    {
        $productDraft->sendToVerification();

        $this->verificationStatus = $productDraft->getStatus();
        $this->publishedAt = $productDraft->getPublishedAt();
    }

    public function accept(ProductDraftInterface $productDraft): void
    {
        $productDraft->accept();

        $this->verificationStatus = $productDraft->getStatus();
        $this->lastVerifiedAt = $productDraft->getVerifiedAt();
    }

    public function reject(ProductDraftInterface $productDraft): void
    {
        $productDraft->reject();

        $this->verificationStatus = $productDraft->getStatus();
        $this->lastVerifiedAt = $productDraft->getVerifiedAt();
    }
}
