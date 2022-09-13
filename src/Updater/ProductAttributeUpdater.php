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
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Attribute\Factory\AttributeFactory;
use Sylius\Component\Product\Model\ProductAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeTranslation;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductAttributeUpdater
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function update(DraftAttributeInterface $draftAttribute, ProductAttributeInterface $productAttribute): void
    {
        $productAttribute->setPosition($productAttribute->getPosition());

        $draftTranslations = $draftAttribute->getTranslations();

        foreach ($productAttribute->getTranslations() as $translation) {
            $this->entityManager->remove($translation);
        }

        foreach ($draftTranslations as $draftTranslation) {
            $productAttributeTranslation = new ProductAttributeTranslation();
            $productAttributeTranslation->setTranslatable($productAttribute);
            $productAttributeTranslation->setLocale($draftTranslation->getLocale());
            $productAttributeTranslation->setName($draftTranslation->getName());
            $this->entityManager->persist($productAttributeTranslation);
        }
    }
}
