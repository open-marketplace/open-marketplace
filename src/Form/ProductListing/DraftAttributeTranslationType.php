<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Form\ProductListing;

use Sylius\Bundle\AttributeBundle\Form\Type\AttributeTranslationType;

final class DraftAttributeTranslationType extends AttributeTranslationType
{
    public function getBlockPrefix(): string
    {
        return 'sylius_product_attribute_translation';
    }
}
