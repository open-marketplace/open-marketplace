<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Product\Model\ProductVariantTranslation;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface ProductVariantTranslationFactoryInterface
{
    public function createNew(): ProductVariantTranslation;

    public function create(
        ?TranslatableInterface $translatable,
        ?string $name,
        ?string $locale
    ): ProductVariantTranslation;

    public function createFromProductListingTranslation(ProductVariantInterface $productVariant, ProductTranslationInterface $translation): ProductVariantTranslation;
}
