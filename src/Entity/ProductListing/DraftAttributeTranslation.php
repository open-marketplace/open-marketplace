<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use Sylius\Component\Attribute\Model\AttributeTranslation;
use Sylius\Component\Product\Model\ProductAttributeTranslationInterface;

class DraftAttributeTranslation extends AttributeTranslation implements DraftAttributeTranslationInterface
{
    protected ?ProductAttributeTranslationInterface $productAttributeTranslation;

   public function getProductAttributeTranslation(): ?ProductAttributeTranslationInterface
    {
        return $this->productAttributeTranslation;
    }

    public function setProductAttributeTranslation(?ProductAttributeTranslationInterface $productAttributeTranslation): void
    {
        $this->productAttributeTranslation = $productAttributeTranslation;
    }
}
