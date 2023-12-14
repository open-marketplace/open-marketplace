<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Product\Factory;

use Sylius\Component\Product\Model\ProductAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeValueInterface;

final class ProductAttributeValueFactory implements ProductAttributeValueFactoryInterface
{
    public function __construct(
        private string $classFQN
    ) {
    }

    public function create(): ProductAttributeValueInterface
    {
        /** @phpstan-ignore-next-line  */
        return new $this->classFQN();
    }

    public function createWithProductAttributeAndValue(
        ProductAttributeInterface $productAttribute,
        mixed $value
    ): ProductAttributeValueInterface {
        $productAttributeValue = $this->create();
        $productAttributeValue->setAttribute($productAttribute);
        $productAttributeValue->setValue($value);

        return $productAttributeValue;
    }
}
