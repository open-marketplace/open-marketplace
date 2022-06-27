<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ProductTranslation;
use Sylius\Component\Resource\Model\TranslatableInterface;

final class ProductTranslationFactory implements ProductTranslationFactoryInterface
{
    public function createNew(): ProductTranslation
    {
        return new ProductTranslation();
    }

    public function create(
        ?TranslatableInterface $translatable,
        ?string $name,
        ?string $description,
        ?string $slug,
        ?string $locale,
        ?string $shortDescription,
        ?string $metaDescription,
        ?string $metaKeywords
    ): ProductTranslation {
        $productTranslation = new ProductTranslation();

        $productTranslation->setTranslatable($translatable);
        $productTranslation->setName($name);
        $productTranslation->setDescription($description);
        $productTranslation->setSlug($slug);
        $productTranslation->setLocale($locale);
        $productTranslation->setShortDescription($shortDescription);
        $productTranslation->setMetaDescription($metaDescription);
        $productTranslation->setMetaKeywords($metaKeywords);

        return $productTranslation;
    }
}
