<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use Sylius\Component\Attribute\Model\AttributeTranslationInterface as BaseAttributeTranslationInterface;
use Sylius\Component\Product\Model\ProductAttributeTranslationInterface;

interface DraftAttributeTranslationInterface extends BaseAttributeTranslationInterface
{
    public function getProductAttributeTranslation(): ?ProductAttributeTranslationInterface;

    public function setProductAttributeTranslation(?ProductAttributeTranslationInterface $productAttributeTranslation): void;
}
