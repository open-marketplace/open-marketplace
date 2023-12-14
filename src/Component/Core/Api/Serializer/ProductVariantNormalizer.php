<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Serializer;

use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ProductVariantNormalizer implements ContextAwareNormalizerInterface, NormalizerAwareInterface
{
    public function __construct(
        private ContextAwareNormalizerInterface $productVariantNormalizer,
        private SectionProviderInterface $sectionProvider,
    ) {
    }

    public function supportsNormalization(
        $data,
        string $format = null,
        array $context = []
    ): bool {
        return $this->productVariantNormalizer->supportsNormalization($data, $format, $context) && $this->isNotShopVendorApiSection();
    }

    public function normalize(
        $object,
        string $format = null,
        array $context = []
    ) {
        return $this->productVariantNormalizer->normalize($object, $format, $context);
    }

    private function isNotShopVendorApiSection(): bool
    {
        return !$this->sectionProvider->getSection() instanceof ShopVendorApiSection;
    }

    public function setNormalizer(NormalizerInterface $normalizer): void
    {
        /** @phpstan-ignore-next-line BaseProductVariantNormalize doesn't have interface */
        $this->productVariantNormalizer->setNormalizer($normalizer);
    }
}
