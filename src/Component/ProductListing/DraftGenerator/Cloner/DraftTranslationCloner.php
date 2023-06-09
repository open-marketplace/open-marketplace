<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use BitBag\OpenMarketplace\Exception\LocaleNotFoundException;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftTranslationCloner implements DraftTranslationClonerInterface
{
    public function __construct(
        private FactoryInterface $translationFactory
    ) {
    }

    public function clone(DraftInterface $from, DraftInterface $to): void
    {
        /** @var DraftTranslationInterface $translation */
        foreach ($from->getTranslations() as $translation) {
            $locale = $translation->getLocale();
            if (null === $locale) {
                throw new LocaleNotFoundException('Locale not found.');
            }

            /** @var DraftTranslationInterface $newTranslation */
            $newTranslation = $this->translationFactory->createNew();
            $newTranslation->setName($translation->getName());
            $newTranslation->setProductDraft($to);
            $newTranslation->setDescription($translation->getDescription());
            $newTranslation->setLocale($locale);
            $newTranslation->setMetaDescription($translation->getMetaDescription());
            $newTranslation->setMetaKeywords($translation->getMetaKeywords());
            $newTranslation->setSlug($translation->getSlug());
            $newTranslation->setShortDescription($translation->getShortDescription());
            $to->addTranslationWithKey($newTranslation, $locale);
        }
    }
}
