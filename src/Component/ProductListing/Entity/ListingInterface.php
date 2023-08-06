<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Entity;

use BitBag\OpenMarketplace\Api\UuidAwareInterface;
use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorAwareInterface;
use DatetimeInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ListingInterface extends ResourceInterface, VendorAwareInterface, UuidAwareInterface
{
    public function getId(): int;

    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;

    public function isRemoved(): bool;

    public function remove(): void;

    public function restore(): void;

    public function getVerificationStatus(): string;

    public function setVerificationStatus(string $verificationStatus): void;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    /** @return Collection<int, DraftInterface> */
    public function getProductDrafts(): Collection;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): void;

    public function getPublishedAt(): ?DateTimeInterface;

    public function setPublishedAt(DatetimeInterface $publishedAt): void;

    public function getLastVerifiedAt(): ?DateTimeInterface;

    public function setLastVerifiedAt(DateTimeInterface $lastVerifiedAt): void;

    public function getCreatedAt(): ?DateTimeInterface;

    public function setCreatedAt(DatetimeInterface $createdAt): void;

    public function insertDraft(DraftInterface $newDraft): void;

    public function getAnyTranslationName(): ?string;

    public function getLatestDraft(): ?DraftInterface;

    public function needsNewDraft(): bool;

    public function canBeVerified(): bool;

    public function sendToVerification(DraftInterface $productDraft): void;

    public function accept(): void;

    public function reject(): void;
}
