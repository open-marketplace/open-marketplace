<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductListingPriceInterface extends ResourceInterface
{
    public function getId(): int;

    public function setId(int $id): ProductListingPrice;

    public function getProductDraft(): ProductDraft;

    public function setProductDraft(ProductDraft $productDraft): ProductListingPrice;

    public function getPrice(): float;

    public function setPrice(float $price): ProductListingPrice;

    public function getOriginalPrice(): float;

    public function setOriginalPrice(float $originalPrice): ProductListingPrice;

    public function getMinimumPrice(): float;

    public function setMinimumPrice(float $minimumPrice): ProductListingPrice;

    public function getChannelCode(): string;

    public function setChannelCode(string $channelCode): ProductListingPrice;
}