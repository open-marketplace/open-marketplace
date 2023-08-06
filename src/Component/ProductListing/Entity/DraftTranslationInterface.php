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

interface DraftTranslationInterface extends UuidAwareInterface
{
    public function getId(): ?int;

    public function setId(int $id): void;

    public function getProductDraft(): DraftInterface;

    public function setProductDraft(DraftInterface $productDraft): void;

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getSlug(): ?string;

    public function setSlug(?string $slug): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

    public function getMetaKeywords(): ?string;

    public function setMetaKeywords(?string $metaKeywords): void;

    public function getMetaDescription(): ?string;

    public function setMetaDescription(?string $metaDescription): void;

    public function getShortDescription(): ?string;

    public function setShortDescription(?string $shortDescription): void;

    public function getLocale(): ?string;

    public function setLocale(?string $locale): void;
}
