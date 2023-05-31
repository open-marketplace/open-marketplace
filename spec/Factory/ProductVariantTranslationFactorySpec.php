<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Factory\ProductVariantTranslationFactory;
use BitBag\OpenMarketplace\Factory\ProductVariantTranslationFactoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Product\Model\ProductVariantTranslation;

final class ProductVariantTranslationFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductVariantTranslationFactory::class);
    }

    public function it_should_implement_interface(): void
    {
        $this->shouldImplement(ProductVariantTranslationFactoryInterface::class);
    }

    public function it_should_create_empty_product_variant_translation(): void
    {
        $this->createNew()->shouldHaveType(ProductVariantTranslation::class);
    }

    public function it_should_create_product_variant_translation_with_data(
        ProductVariantInterface $productVariant
    ): void {
        $translation = $this->create($productVariant, 'translation', 'en');
        $translation->getName()->shouldReturn('translation');
        $translation->getLocale()->shouldReturn('en');
        $translation->getTranslatable()->shouldReturn($productVariant);
    }

    public function it_should_create_product_variant_translation_from_product_listing(
        ProductVariantInterface $productVariant,
        DraftTranslationInterface $productTranslation
    ): void {
        $productTranslation->getName()->willReturn('translation');
        $productTranslation->getLocale()->willReturn('en');

        $productVariantTranslation = $this->createFromProductListingTranslation(
            $productVariant,
            $productTranslation
        );

        $productVariantTranslation->getName()->shouldReturn('translation');
        $productVariantTranslation->getLocale()->shouldReturn('en');
        $productVariantTranslation->getTranslatable()->shouldReturn($productVariant);
    }
}
