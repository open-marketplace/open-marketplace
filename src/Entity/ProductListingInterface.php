<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity;

use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductListingInterface extends ResourceInterface
{
    public const STATUS_CREATED = 'created';

    public const STATUS_UNDER_VERIFICATION = 'under_verification';

    public const STATUS_VERIFIED = 'verified';

    public const STATUS_REJECTED = 'rejected';

    public function getName(): ?string;

    public function setName(string $name): void;

    public function getPublishedAt(): ?\DateTimeInterface;

    public function setPublishedAt(\DatetimeInterface $publishedAt): void;

    public function getStatus(): ?string;

    public function setStatus(string $status): void;

    public function getVerifiedAt(): ?\DateTimeInterface;

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): void;

    public function getVersionNumber(): ?int;

    public function setVersionNumber(?int $versionNumber): void;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): void;

    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function getLocale(): ?string;

    public function setLocale(?string $locale): void;

    public function getSlug(): ?string;

    public function setSlug(?string $slug): void;
}
