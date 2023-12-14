<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Entity;

use BitBag\OpenMarketplace\Component\Core\Api\UuidAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ListingPriceInterface extends ResourceInterface, UuidAwareInterface
{
    public function getId(): ?int;

    public function setId(int $id): void;

    public function getProductDraft(): DraftInterface;

    public function setProductDraft(DraftInterface $productDraft): void;

    public function getPrice(): ?int;

    public function setPrice(?int $price): void;

    public function getOriginalPrice(): ?int;

    public function setOriginalPrice(?int $originalPrice): void;

    public function getMinimumPrice(): int;

    public function setMinimumPrice(int $minimumPrice): void;

    public function getChannelCode(): string;

    public function setChannelCode(string $channelCode): void;
}
