<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Model\ProductVariant;

final class ProductVariantFactory implements ProductVariantFactoryInterface
{
    public function createNew(): ProductVariant
    {
        return new ProductVariant();
    }

    public function createNewForProduct(
        ProductInterface $product,
        bool $enabled,
        int $position
    ): ProductVariant {
        $productVariant = new ProductVariant();

        $productVariant->setProduct($product);
        $productVariant->setCode($product->getCode());
        $productVariant->setEnabled($enabled);
        $productVariant->setPosition($position);
        $product->addVariant($productVariant);

        return $productVariant;
    }
}
