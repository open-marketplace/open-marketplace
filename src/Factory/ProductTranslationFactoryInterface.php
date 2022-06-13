<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Sylius\Component\Core\Model\ProductTranslation;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface ProductTranslationFactoryInterface
{
    public function createNew(): ProductTranslation;

    public function create(
        TranslatableInterface $translatable,
        string $name,
        string $description,
        string $slug,
        string $locale,
        ?string $shortDescription,
        ?string $metaDescription,
        ?string $metaKeywords
    ): ProductTranslation;
}
