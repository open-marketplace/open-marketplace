<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductDraftInterface extends ResourceInterface
{
    public const STATUS_CREATED = 'created';

    public const STATUS_UNDER_VERIFICATION = 'under_verification';

    public const STATUS_VERIFIED = 'verified';

    public const STATUS_REJECTED = 'rejected';

    public function getId(): ?int;

    public function setId(int $id): void;

    public function getCode(): string;

    public function setCode(string $code): void;

    public function isVerified(): bool;

    public function setIsVerified(bool $isVerified): void;

    public function getVerifiedAt(): ?\DateTimeInterface;

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): void;

    public function getCreatedAt(): \DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createdAt): void;

    public function getVersionNumber(): int;

    public function setVersionNumber(int $versionNumber): void;

    public function getTranslations(): Collection;

    public function addTranslations(ProductTranslation $translation): void;

    public function addTranslationsWithKey(ProductTranslation $translation, string $key): void;

    public function getProductListingPrice(): Collection;

    public function addProductListingPrice(ProductListingPriceInterface $productListingPrice): void;

    public function addProductListingPriceWithKey(ProductListingPriceInterface $productListingPrice, string $key): void;

    public function getProductListing(): ProductListing;

    public function setProductListing(ProductListing $productListing): void;

    public function getStatus(): ?string;

    public function setStatus(string $status): void;

    public function newVersion(): void;
}
