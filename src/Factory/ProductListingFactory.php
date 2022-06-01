<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingFactory implements ProductListingFactoryInterface
{
    private FactoryInterface $productListingFactory;

    public function __construct(FactoryInterface $productListingFactory)
    {
        $this->productListingFactory = $productListingFactory;
    }

    public function createNew(): ProductListingInterface
    {
        return $this->productListingFactory->createNew();
    }

    public function create(
        string $name,
        string $code,
        string $locale,
        string $slug
    ): ProductListingInterface {
        $productListing = $this->createNew();

        $productListing->setName($name);
        $productListing->setCode($code);
        $productListing->setLocale($locale);
        $productListing->setSlug($slug);
        $productListing->setStatus(ProductListingInterface::STATUS_CREATED);
        $productListing->setVersionNumber(0);

        return $productListing;
    }
}
