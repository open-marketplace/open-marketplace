<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeTranslationFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Product\Model\ProductAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeTranslation;

final class ProductAttributeUpdater implements ProductAttributeUpdaterInterface
{
    private EntityManagerInterface $entityManager;

    private ProductAttributeTranslationFactoryInterface $attributeTranslationFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory
    ) {
        $this->entityManager = $entityManager;
        $this->attributeTranslationFactory = $attributeTranslationFactory;
    }

    public function update(DraftAttributeInterface $draftAttribute, ProductAttributeInterface $productAttribute): void
    {
        $productAttribute->setPosition($productAttribute->getPosition());

        $draftTranslations = $draftAttribute->getTranslations();

        $productAttributeTranslations = $productAttribute->getTranslations();
        foreach ($productAttributeTranslations as $translation) {
            $this->entityManager->remove($translation);
            $this->entityManager->flush();
        }

        /** @var DraftAttributeTranslationInterface $draftTranslation */
        foreach ($draftTranslations as $draftTranslation) {
            $productAttributeTranslation = $this->attributeTranslationFactory->create();
            $productAttributeTranslation->setTranslatable($productAttribute);
            $productAttributeTranslation->setLocale($draftTranslation->getLocale());
            $productAttributeTranslation->setName($draftTranslation->getName());
            $this->entityManager->persist($productAttributeTranslation);
        }
    }
}
