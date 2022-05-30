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

    public function setCreateAt(\DatetimeInterface $publishedAt): ProductListingInterface;

    public function getVerifiedAt(): ?\DateTimeInterface;

    public function setVerifiedAt(?\DateTimeInterface $verifiedAt): ProductListingInterface;

    public function getVersionNumber(): ?int;

    public function setVersionNumber(?int $versionNumber): ProductListingInterface;

    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): ProductListingInterface;

    public function getCode(): ?string;

    public function setCode(?string $code): ProductListingInterface;

    public function addProductDrafts($productDrafts): ProductListingInterface;

    public function getProductDrafts(): Collection;

    public function getVendor(): ShopUserInterface;

    public function setVendor(ShopUserInterface $vendor): ProductListingInterface;
}
