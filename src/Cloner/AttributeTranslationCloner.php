<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Cloner;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeTranslationInterface;
use BitBag\OpenMarketplace\Factory\ProductAttributeTranslationFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class AttributeTranslationCloner implements AttributeTranslationClonerInterface
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

    public function clone(DraftAttributeInterface $draftAttribute): void
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
