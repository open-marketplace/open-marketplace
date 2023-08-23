<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner\DraftTranslationCloner;
use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner\DraftTranslationClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTranslationInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftTranslationClonerSpec extends ObjectBehavior
{
    public function let(FactoryInterface $translationFactory): void
    {
        $this->beConstructedWith($translationFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(DraftTranslationCloner::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(DraftTranslationClonerInterface::class);
    }

    public function it_clones_product_listing_translations(
        DraftInterface $newProductDraft,
        DraftInterface $productDraft,
        DraftTranslationInterface $translation,
        DraftTranslationInterface $newTranslation,
        FactoryInterface $translationFactory
    ): void {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$translation->getWrappedObject()]));

        $translation->getLocale()
            ->willReturn('en_US');

        $translationFactory->createNew()
            ->willReturn($newTranslation);

        $translation->getName()
            ->willReturn('name');

        $translation->getDescription()
            ->willReturn('description');

        $translation->getMetaDescription()
            ->willReturn('metaDescription');

        $translation->getMetaKeywords()
            ->willReturn('metaKeywords');

        $translation->getSlug()
            ->willReturn('slug');

        $translation->getShortDescription()
            ->willReturn('shortDescription');

        $newTranslation->setName('name')
        ->shouldBeCalled();

        $newTranslation->setProductDraft($newProductDraft)
            ->shouldBeCalled();

        $newTranslation->setDescription('description')
            ->shouldBeCalled();

        $newTranslation->setLocale('en_US')
            ->shouldBeCalled();

        $newTranslation->setMetaDescription('metaDescription')
            ->shouldBeCalled();

        $newTranslation->setMetaKeywords('metaKeywords')
            ->shouldBeCalled();

        $newTranslation->setSlug('slug')
            ->shouldBeCalled();

        $newTranslation->setShortDescription('shortDescription')
            ->shouldBeCalled();

        $newProductDraft->addTranslationWithKey($newTranslation, 'en_US')
        ->shouldBeCalled();

        $this->clone($productDraft, $newProductDraft);
    }
}
