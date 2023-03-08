<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Serializer;

use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Api\Serializer\ProductVariantNormalizer;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;

final class ProductVariantNormalizerSpec extends ObjectBehavior
{
    public function let(
        ContextAwareNormalizerInterface $productVariantNormalizer,
        SectionProviderInterface $sectionProvider,
    ): void {
        $this->beConstructedWith($productVariantNormalizer, $sectionProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductVariantNormalizer::class);
        $this->shouldHaveType(ContextAwareNormalizerInterface::class);
        $this->shouldHaveType(NormalizerAwareInterface::class);
    }

    public function it_normalize_by_inner(
        ContextAwareNormalizerInterface $productVariantNormalizer,
        ProductVariantInterface $productVariant,
    ): void {
        $productVariantNormalizer->normalize($productVariant, null, [])->willReturn($productVariant);

        $this->normalize($productVariant)->shouldReturn($productVariant);
    }

    public function it_does_not_supports_normalization_if_inner_not(
        ContextAwareNormalizerInterface $productVariantNormalizer,
        ProductVariantInterface $productVariant,
    ): void {
        $productVariantNormalizer->supportsNormalization($productVariant, null, [])->willReturn(false);

        $this->supportsNormalization($productVariant)->shouldReturn(false);
    }

    public function it_does_not_supports_normalization_if_section_is_shop_vendor_api(
        ContextAwareNormalizerInterface $productVariantNormalizer,
        ProductVariantInterface $productVariant,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        ): void {
        $productVariantNormalizer->supportsNormalization($productVariant, null, [])->willReturn(true);
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);

        $this->supportsNormalization($productVariant)->shouldReturn(false);
    }

    public function it_supports_normalization_if_section_is_not_shop_vendor_api(
        ContextAwareNormalizerInterface $productVariantNormalizer,
        ProductVariantInterface $productVariant,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        ): void {
        $productVariantNormalizer->supportsNormalization($productVariant, null, [])->shouldBeCalled()->willReturn(true);
        $sectionProvider->getSection()->willReturn($shopApiSection);

        $this->supportsNormalization($productVariant)->shouldReturn(true);
    }
}
