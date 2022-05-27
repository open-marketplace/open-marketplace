<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;


interface ProductTranslationInterface
{
    public function getId(): int;

    public function setId(int $id): ProductTranslation;

    public function getProductDraft(): ProductDraftInterface;

    public function setProductDraft(ProductDraftInterface $productDraft): ProductTranslation;

    public function getName(): string;

    public function setName(string $name): ProductTranslation;

    public function getSlug(): string;

    public function setSlug(string $slug): ProductTranslation;

    public function getDescription(): string;

    public function setDescription(string $description): ProductTranslation;

    public function getMetaKeywords(): string;

    public function setMetaKeywords(string $metaKeywords): ProductTranslation;

    public function getMetaDescription(): string;

    public function setMetaDescription(string $metaDescription): ProductTranslation;

    public function getShortDescription(): string;

    public function setShortDescription(string $shortDescription): ProductTranslation;

    public function getLocale(): string;

    public function setLocale(string $locale): ProductTranslation;
}