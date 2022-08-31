<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductVariantTranslationFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductVariantTranslationFactoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductVariantTranslation;
use Sylius\Component\Product\Model\ProductVariant;

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

    public function it_should_create_empty_vendor_image(): void
    {
        $vendorImage = new ProductVariantTranslation();

        $this->createNew()->shouldBeLike($vendorImage);
    }

    public function it_should_create_product_variant_translation_with_data(): void
    {
        $productVariant = new ProductVariant();
        $productVariantTranslation = new ProductVariantTranslation();

        $productVariantTranslation->setTranslatable($productVariant);
        $productVariantTranslation->setName('translation');
        $productVariantTranslation->setLocale('en');

        $this->create($productVariant, 'translation', 'en')->shouldBeLike($productVariantTranslation);
    }
}
