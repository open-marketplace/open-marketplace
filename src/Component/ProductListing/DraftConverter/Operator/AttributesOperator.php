<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductAttributeFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Cloner\AttributeTranslationClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Cloner\AttributeValueClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Extractor\DraftAttributesExtractorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Doctrine\ORM\EntityManagerInterface;

final class AttributesOperator implements AttributesOperatorInterface
{
    public function __construct(
        private ProductAttributeFactoryInterface $productAttributeFactory,
        private EntityManagerInterface $entityManager,
        private DraftAttributesExtractorInterface $attributesExtractor,
        private AttributeTranslationClonerInterface $attributeTranslationCloner,
        private AttributeValueClonerInterface $attributeValueCloner
    ) {

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
