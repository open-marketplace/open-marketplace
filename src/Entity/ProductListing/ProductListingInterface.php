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
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductListingInterface extends ResourceInterface
{
    public function getId(): int;

    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(\DatetimeInterface $createdAt): void;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): void;

    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function addProductDrafts(ProductDraftInterface $productDrafts): void;

    public function getAnyTranslationName(): ?string;

    /** @return Collection<int, ProductDraftInterface> */
    public function getProductDrafts(): Collection;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function isRemoved(): bool;

    public function setRemoved(bool $deleted): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $enabled): void;
}
