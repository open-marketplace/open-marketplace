<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;


class ProductListingPrice implements ProductListingPriceInterface, \ArrayAccess
{
    protected int $id;

    protected ProductDraft $productDraft;

    protected ?float $price;

    protected ?float $originalPrice;

    protected ?float $minimumPrice;

    protected string $channelCode;

    public function __construct()
    {
        $this->channelCode = 'test';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getProductDraft(): ProductDraft
    {
        return $this->productDraft;
    }

    public function setProductDraft(ProductDraft $productDraft): void
    {
        $this->productDraft = $productDraft;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getOriginalPrice(): ?float
    {
        return $this->originalPrice;
    }

    public function setOriginalPrice(?float $originalPrice): void
    {
        $this->originalPrice = $originalPrice;
    }

    public function getMinimumPrice(): ?float
    {
        return $this->minimumPrice;
    }

    public function setMinimumPrice(?float $minimumPrice): void
    {
        $this->minimumPrice = $minimumPrice;
    }

    public function getChannelCode(): string
    {
        return $this->channelCode;
    }

    public function setChannelCode(string $channelCode): void
    {
        $this->channelCode = $channelCode;
    }



    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}