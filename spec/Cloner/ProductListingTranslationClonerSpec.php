<?php

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Cloner;

use BitBag\OpenMarketplace\Cloner\ProductListingTranslationCloner;
use BitBag\OpenMarketplace\Cloner\ProductListingTranslationClonerInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductTranslationInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingTranslationClonerSpec extends ObjectBehavior
{
    public function let(FactoryInterface $translationFactory): void
    {
        $this->beConstructedWith($translationFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductListingTranslationCloner::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ProductListingTranslationClonerInterface::class);
    }

    public function it_clones_product_listing_translations(
        ProductDraftInterface $newProductDraft,
        ProductDraftInterface $productDraft,
        ProductTranslationInterface $translation,
        ProductTranslationInterface $newTranslation,
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

        $newProductDraft->addTranslationsWithKey($newTranslation, 'en_US')
        ->shouldBeCalled();

        $this->cloneTranslation($newProductDraft, $productDraft);
    }
}
