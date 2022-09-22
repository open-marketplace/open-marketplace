<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
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

    /** @return Collection<int, ProductDraftInterface> */
    public function getProductDrafts(): Collection;

    public function getVendor(): VendorInterface;

    public function setVendor(VendorInterface $vendor): void;

    public function isDeleted(): bool;

    public function setDeleted(bool $deleted): void;

    public function isEnabled(): bool;

    public function setEnabled(bool $hidden): void;
}
