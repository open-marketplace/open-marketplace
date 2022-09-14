<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Converter;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Extractor\AttributesExtractorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeTranslationFactoryInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;
use Sylius\Component\Product\Model\ProductAttributeTranslation;
use Sylius\Component\Product\Model\ProductAttributeValue;

final class AttributesConverter implements AttributesConverterInterface
{
    private ProductAttributeFactoryInterface $productAttributeFactory;

    private EntityManagerInterface $entityManager;

    private ProductAttributeTranslationFactoryInterface $attributeTranslationFactory;

    private AttributesExtractorInterface $attributesExtractor;

    public function __construct(
        ProductAttributeFactoryInterface $productAttributeFactory,
        EntityManagerInterface $entityManager,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory,
        AttributesExtractorInterface $attributesExtractor
    ) {
        $this->productAttributeFactory = $productAttributeFactory;
        $this->entityManager = $entityManager;
        $this->attributeTranslationFactory = $attributeTranslationFactory;
        $this->attributesExtractor = $attributesExtractor;
    }

    public function convert(ProductDraftInterface $productDraft, ProductInterface $product): void
    {
        $attributeValues = $productDraft->getAttributes();
        $attributes = $this->attributesExtractor->extract($attributeValues);

        $oldProductAttributeValues = $product->getAttributes();
        foreach ($oldProductAttributeValues as $oldProductAttributeValue) {
            $this->entityManager->remove($oldProductAttributeValue);
        }

        /** @var DraftAttributeInterface $draftAttribute */
        foreach ($attributes as $draftAttribute) {
            if (!$draftAttribute->getProductAttribute()) {
                $newProductAttribute = $this->productAttributeFactory->createClone($draftAttribute);
                $draftAttribute->setProductAttribute($newProductAttribute);
                $this->entityManager->persist($newProductAttribute);
                $this->cloneTranslations($draftAttribute);
            }
        }

        foreach ($attributeValues as $attributeValue) {
            /** @var DraftAttributeInterface $draftAttribute */
            $draftAttribute = $attributeValue->getAttribute();
            $productAttribute = $draftAttribute->getProductAttribute();
            $newProductAttributeValue = new ProductAttributeValue();
            $newProductAttributeValue->setSubject($product);
            $newProductAttributeValue->setAttribute($productAttribute);
            $newProductAttributeValue->setLocaleCode($attributeValue->getLocaleCode());
            $newProductAttributeValue->setValue($attributeValue->getValue());
            $this->entityManager->persist($newProductAttributeValue);
            $this->entityManager->flush();
        }

        $this->entityManager->flush();
    }

    private function cloneTranslations(DraftAttributeInterface $draftAttribute): void
    {
        $translations = $draftAttribute->getTranslations();
        /** @var DraftAttributeTranslationInterface $translation */
        foreach ($translations as $translation) {
            $newTranslation = $this->attributeTranslationFactory->create();
            $newTranslation->setLocale($translation->getLocale());
            $newTranslation->setName($translation->getName());
            $newTranslation->setTranslatable($draftAttribute->getProductAttribute());
            $this->entityManager->persist($newTranslation);
        }
    }
}
