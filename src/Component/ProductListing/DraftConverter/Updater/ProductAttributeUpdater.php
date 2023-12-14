<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Updater;

use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Cloner\AttributeTranslationClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Product\Model\ProductAttributeInterface;

final class ProductAttributeUpdater implements ProductAttributeUpdaterInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private AttributeTranslationClonerInterface $attributeTranslationCloner
    ) {
    }

    public function update(DraftAttributeInterface $draftAttribute, ProductAttributeInterface $productAttribute): void
    {
        $productAttribute->setPosition($productAttribute->getPosition());

        $productAttributeTranslations = $productAttribute->getTranslations();
        foreach ($productAttributeTranslations as $translation) {
            $this->entityManager->remove($translation);
        }
        $this->attributeTranslationCloner->clone($draftAttribute);
    }
}
