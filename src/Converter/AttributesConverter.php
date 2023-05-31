<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Converter;

use BitBag\OpenMarketplace\Cloner\AttributeTranslationClonerInterface;
use BitBag\OpenMarketplace\Cloner\AttributeValueClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Extractor\AttributesExtractorInterface;
use BitBag\OpenMarketplace\Factory\ProductAttributeFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class AttributesConverter implements AttributesConverterInterface
{
    private ProductAttributeFactoryInterface $productAttributeFactory;

    private EntityManagerInterface $entityManager;

    private AttributesExtractorInterface $attributesExtractor;

    private AttributeTranslationClonerInterface $attributeTranslationCloner;

    private AttributeValueClonerInterface $attributeValueCloner;

    public function __construct(
        ProductAttributeFactoryInterface $productAttributeFactory,
        EntityManagerInterface $entityManager,
        AttributesExtractorInterface $attributesExtractor,
        AttributeTranslationClonerInterface $attributeTranslationCloner,
        AttributeValueClonerInterface $attributeValueCloner
    ) {
        $this->productAttributeFactory = $productAttributeFactory;
        $this->entityManager = $entityManager;
        $this->attributesExtractor = $attributesExtractor;
        $this->attributeTranslationCloner = $attributeTranslationCloner;
        $this->attributeValueCloner = $attributeValueCloner;
    }

    public function convert(DraftInterface $productDraft, ProductInterface $product): void
    {
        $attributeValues = $productDraft->getAttributes();
        $attributes = $this->attributesExtractor->extract($attributeValues);

        $oldProductAttributeValues = $product->getAttributes();

        foreach ($oldProductAttributeValues as $oldProductAttributeValue) {
            $oldProductAttributeValue = $this->entityManager->merge($oldProductAttributeValue);
            $this->entityManager->remove($oldProductAttributeValue);
        }

        $this->entityManager->flush();

        /** @var DraftAttributeInterface $draftAttribute */
        foreach ($attributes as $draftAttribute) {
            if (!$draftAttribute->getProductAttribute()) {
                $newProductAttribute = $this->productAttributeFactory->createClone($draftAttribute);
                $draftAttribute->setProductAttribute($newProductAttribute);
                $this->entityManager->persist($newProductAttribute);
                $this->attributeTranslationCloner->clone($draftAttribute);
            }
        }

        $this->attributeValueCloner->clone($productDraft, $product);
    }
}
