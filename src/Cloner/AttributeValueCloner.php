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
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeValueFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class AttributeValueCloner implements AttributeValueClonerInterface
{
    private EntityManagerInterface $entityManager;

    private ProductAttributeValueFactoryInterface $attributeValueFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ProductAttributeValueFactoryInterface $attributeValueFactory
    ) {
        $this->entityManager = $entityManager;
        $this->attributeValueFactory = $attributeValueFactory;
    }

    public function clone(ProductDraftInterface $productDraft, ProductInterface $product): void
    {
        $attributeValues = $productDraft->getAttributes();
        foreach ($attributeValues as $draftAttributeValue) {
            /** @var DraftAttributeInterface $draftAttribute */
            $draftAttribute = $draftAttributeValue->getAttribute();
            $productAttribute = $draftAttribute->getProductAttribute();
            $newProductAttributeValue = $this->attributeValueFactory->create();
            $newProductAttributeValue->setSubject($product);
            $newProductAttributeValue->setAttribute($productAttribute);
            $newProductAttributeValue->setLocaleCode($draftAttributeValue->getLocaleCode());
            $newProductAttributeValue->setValue($draftAttributeValue->getValue());
            $this->entityManager->persist($newProductAttributeValue);
        }
    }
}
