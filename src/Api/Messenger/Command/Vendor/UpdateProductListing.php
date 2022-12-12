<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\Command\Vendor;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftTaxonInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductTranslationInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class UpdateProductListing implements UpdateProductListingInterface
{
    private ?string $listingId;

    /**
     * @var array<int|string, ImageInterface>|null
     */
    private ?array $images;

    /**
     * @var array<int|string, ProductTranslationInterface>|null
     */
    private ?array $translations;

    /** @var array<int|string, ProductListingPriceInterface>|null
     */
    private ?array $productListingPrice;

    /**
     * @var array<int, AttributeValueInterface>|null
     */
    protected ?array $attributes;

    protected ?TaxonInterface $mainTaxon;

    /**
     * @var array<array-key, ProductDraftTaxonInterface>|null
     */
    protected ?array $productDraftTaxons;

    public function __construct(
        ?array $images,
        ?array $translations,
        ?array $productListingPrice,
        ?array $attributes,
        ?TaxonInterface $mainTaxon,
        ?array $productDraftTaxons
    ) {
        $this->images = $images;
        $this->translations = $translations;
        $this->productListingPrice = $productListingPrice;
        $this->attributes = $attributes;
        $this->mainTaxon = $mainTaxon;
        $this->productDraftTaxons = $productDraftTaxons;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    public function getProductListingPrice(): ?array
    {
        return $this->productListingPrice;
    }

    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    public function getMainTaxon(): ?TaxonInterface
    {
        return $this->mainTaxon;
    }

    public function getProductDraftTaxons(): ?array
    {
        return $this->productDraftTaxons;
    }

    public function getResourceId(): ?string
    {
        return $this->listingId;
    }

    public function setResourceId(?string $resourceId): void
    {
        $this->listingId = $resourceId;
    }

    public function getResourceIdAttributeKey(): string
    {
        return 'id';
    }
}