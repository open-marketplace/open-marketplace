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

class ProductTranslation implements ProductTranslationInterface, ResourceInterface
{

    protected int $id;

    protected ProductDraftInterface $productDraft;

    protected ?string $name;

    protected ?string $slug;

    protected ?string $description;

    protected ?string $metaKeywords;

    protected ?string $metaDescription;

    protected ?string $shortDescription;

    protected string $locale;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ProductTranslation
    {
        $this->id = $id;
        return $this;
    }

    public function getProductDraft(): ProductDraftInterface
    {
        return $this->productDraft;
    }

    public function setProductDraft(ProductDraftInterface $productDraft): ProductTranslation
    {
        $this->productDraft = $productDraft;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ProductTranslation
    {
        $this->name = $name;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): ProductTranslation
    {
        $this->slug = $slug;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): ProductTranslation
    {
        $this->description = $description;
        return $this;
    }

    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(string $metaKeywords): ProductTranslation
    {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): ProductTranslation
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): ProductTranslation
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): ProductTranslation
    {
        $this->locale = $locale;
        return $this;
    }

}