<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Product\Model\ProductAttributeValue;

final class AttributeValueCloner implements AttributeValueClonerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function clone(ProductDraftInterface $productDraft, ProductInterface $product): void
    {
        $attributeValues = $productDraft->getAttributes();
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
        }
    }
}
