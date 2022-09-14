<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Converter;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AttributeTranslationClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AttributeValueClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Converter\AttributesConverter;
use BitBag\SyliusMultiVendorMarketplacePlugin\Extractor\AttributesExtractorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

final class AttributesConverterSpec extends ObjectBehavior
{
    public function let(
        ProductAttributeFactoryInterface $productAttributeFactory,
        EntityManagerInterface $entityManager,
        AttributesExtractorInterface $attributesExtractor,
        AttributeTranslationClonerInterface $attributeTranslationCloner,
        AttributeValueClonerInterface $attributeValueCloner
    ): void {
        $this->beConstructedWith(
            $productAttributeFactory,
            $entityManager,
            $attributesExtractor,
            $attributeTranslationCloner,
            $attributeValueCloner
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AttributesConverter::class);
    }
}
