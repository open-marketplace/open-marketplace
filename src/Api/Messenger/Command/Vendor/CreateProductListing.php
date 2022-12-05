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
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Attribute\Model\AttributeValueInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\TaxonInterface;

final class CreateProductListing implements CreateProductListingInterface
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var array<int|string, ImageInterface>
     */
    private $images;

    /**
     * @var array<int|string, ProductTranslationInterface>
     */
    private $translations;

    /** @var array<int|string, ProductListingPriceInterface>
     */
    private $productListingPrice;

    /**
     * @var array<int, AttributeValueInterface>
     */
    protected $attributes;

    /**
     * @var TaxonInterface|null
     */
    protected $mainTaxon;

    /**
     * @var array<array-key, ProductDraftTaxonInterface>
     */
    protected $productDraftTaxons;

    private VendorInterface $vendor;

    public function __construct(
        string $code,
        array $images,
        array $translations,
        array $productListingPrice,
        array $attributes,
        ?TaxonInterface $mainTaxon,
        array $productDraftTaxons
    ) {
        $this->code = $code;
        $this->images = $images;
        $this->translations = $translations;
        $this->productListingPrice = $productListingPrice;
        $this->attributes = $attributes;
        $this->mainTaxon = $mainTaxon;
        $this->productDraftTaxons = $productDraftTaxons;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return array<int|string, ImageInterface>
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @return array<int|string, ProductTranslationInterface>
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @return array<int|string, ProductListingPriceInterface>
     */
    public function getProductListingPrice(): array
    {
        return $this->productListingPrice;
    }

    /**
     * @return array<int, AttributeValueInterface>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getMainTaxon(): ?TaxonInterface
    {
        return $this->mainTaxon;
    }

    /**
     * @return array<array-key, ProductDraftTaxonInterface>
     */
    public function getProductDraftTaxons(): array
    {
        return $this->productDraftTaxons;
    }

    public function getVendor(): VendorInterface
    {
        return $this->getVendor();
    }

    public function setVendor(VendorInterface $vendor): void
    {
        $this->vendor = $vendor;
    }
}