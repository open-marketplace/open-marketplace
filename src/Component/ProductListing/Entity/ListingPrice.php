<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Entity;

use Ramsey\Uuid\UuidInterface;

class ListingPrice implements ListingPriceInterface
{
    protected ?int $id = null;

    protected ?UuidInterface $uuid = null;

    protected DraftInterface $productDraft;

    protected ?int $price = null;

    protected ?int $originalPrice = null;

    protected int $minimumPrice = 0;

    protected string $channelCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUuid(): ?UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(?UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getProductDraft(): DraftInterface
    {
        return $this->productDraft;
    }

    public function setProductDraft(DraftInterface $productDraft): void
    {
        $this->productDraft = $productDraft;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function getOriginalPrice(): ?int
    {
        return $this->originalPrice;
    }

    public function setOriginalPrice(?int $originalPrice): void
    {
        $this->originalPrice = $originalPrice;
    }

    public function getMinimumPrice(): int
    {
        return $this->minimumPrice;
    }

    public function setMinimumPrice(int $minimumPrice): void
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
}
