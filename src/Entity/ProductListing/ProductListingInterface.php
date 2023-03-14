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
use BitBag\OpenMarketplace\Entity\UuidAwareInterface;
use BitBag\OpenMarketplace\Entity\VendorAwareInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use DatetimeInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductListingInterface extends ResourceInterface, VendorAwareInterface, UuidAwareInterface
{
    public function getId(): int;

    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;

    public function isRemoved(): bool;

    public function setRemoved(bool $deleted): void;

    public function getVerificationStatus(): string;

    public function setVerificationStatus(string $verificationStatus): void;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    /** @return Collection<int, ProductDraftInterface> */
    public function getProductDrafts(): Collection;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): void;

    public function getPublishedAt(): ?DateTimeInterface;

    public function setPublishedAt(DatetimeInterface $publishedAt): void;

    public function getLastVerifiedAt(): ?DateTimeInterface;

    public function setLastVerifiedAt(DateTimeInterface $lastVerifiedAt): void;

    public function getCreatedAt(): ?DateTimeInterface;

    public function setCreatedAt(DatetimeInterface $createdAt): void;

    public function addProductDraft(ProductDraftInterface $productDraft): void;

    public function getAnyTranslationName(): ?string;

    public function getLatestDraft(): ?ProductDraftInterface;

    public function sendToVerification(ProductDraftInterface $productDraft): void;

    public function accept(ProductDraftInterface $productDraft): void;

    public function reject(ProductDraftInterface $productDraft): void;
}
