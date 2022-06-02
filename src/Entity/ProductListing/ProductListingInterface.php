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
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductListingInterface extends ResourceInterface
{
    public function getCreateAt(): ?\DateTimeInterface;

    public function setCreateAt(\DatetimeInterface $createAt): void;

    public function getVerifiedAt(): ?\DateTimeInterface;

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): void;

    public function getVersionNumber(): ?int;

    public function setVersionNumber(?int $versionNumber): void;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): void;

    public function getCode(): ?string;

    public function setCode(?string $code): void;

    public function addProductDrafts(ProductDraftInterface $productDrafts): void;

    public function getProductDrafts(): Collection;

    public function getVendor(): ShopUserInterface;

    public function setVendor(ShopUserInterface $vendor): void;
}
