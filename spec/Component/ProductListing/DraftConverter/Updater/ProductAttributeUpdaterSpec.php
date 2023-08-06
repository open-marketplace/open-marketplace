<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Updater;

use BitBag\OpenMarketplace\Component\Product\Factory\ProductAttributeTranslationFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Cloner\AttributeTranslationClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Updater\ProductAttributeUpdater;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeTranslationInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeTranslationInterface;

final class ProductAttributeUpdaterSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        AttributeTranslationClonerInterface $attributeTranslationCloner,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory,
        ): void {
        $this->beConstructedWith($entityManager, $attributeTranslationCloner, $attributeTranslationFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductAttributeUpdater::class);
    }

    public function it_doesent_clean_translation_when_product_doesnt_have_them(
        DraftAttributeInterface $draftAttribute,
        EntityManagerInterface $entityManager,
        ProductAttributeInterface $productAttribute,
        ProductAttributeTranslationInterface $productAttributeTranslation,
        DraftAttributeTranslationInterface $draftAttributeTranslation,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory,
        ): void {
        $productPosition = 5;
        $draftAttributeTranslationCollection = new ArrayCollection([$draftAttributeTranslation->getWrappedObject()]);
        $productAttributeTranslationCollection = new ArrayCollection([]);

        $productAttribute->getPosition()->willReturn($productPosition);
        $draftAttribute->getTranslations()->willReturn($draftAttributeTranslationCollection);
        $productAttribute->getTranslations()->willReturn($productAttributeTranslationCollection);

        $attributeTranslationFactory->create()->willReturn($productAttributeTranslation);

        $productAttribute->setPosition($productPosition)->shouldBeCalledOnce();

        $this->update($draftAttribute, $productAttribute);

        $entityManager->flush()->shouldNotBeCalled();
    }

    public function it_cleans_translation_before_appending_new(
        DraftAttributeInterface $draftAttribute,
        EntityManagerInterface $entityManager,
        ProductAttributeInterface $productAttribute,
        ProductAttributeTranslationInterface $productAttributeTranslation,
        ProductAttributeTranslationInterface $firstProductAttributeTranslation,
        ProductAttributeTranslationInterface $secondProductAttributeTranslation,
        DraftAttributeTranslationInterface $draftAttributeTranslation,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory,
        ): void {
        $productPosition = 5;
        $draftAttributeTranslationCollection = new ArrayCollection([$draftAttributeTranslation->getWrappedObject()]);
        $productAttributeTranslationCollection = new ArrayCollection([
            $firstProductAttributeTranslation->getWrappedObject(),
            $secondProductAttributeTranslation->getWrappedObject(),
        ]);

        $productAttribute->getPosition()->willReturn($productPosition);
        $draftAttribute->getTranslations()->willReturn($draftAttributeTranslationCollection);
        $productAttribute->getTranslations()->willReturn($productAttributeTranslationCollection);

        $attributeTranslationFactory->create()->willReturn($productAttributeTranslation);

        $productAttribute->setPosition($productPosition)->shouldBeCalledOnce();

        $this->update($draftAttribute, $productAttribute);

        $entityManager->remove($firstProductAttributeTranslation)->shouldHaveBeenCalledOnce();
        $entityManager->remove($secondProductAttributeTranslation)->shouldHaveBeenCalledOnce();
    }

    public function it_updates_translations(
        DraftAttributeInterface $draftAttribute,
        EntityManagerInterface $entityManager,
        ProductAttributeInterface $productAttribute,
        ProductAttributeTranslationInterface $productAttributeTranslation,
        ProductAttributeTranslationInterface $firstProductAttributeTranslation,
        ProductAttributeTranslationInterface $secondProductAttributeTranslation,
        DraftAttributeTranslationInterface $draftAttributeTranslation,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory,
        AttributeTranslationClonerInterface $attributeTranslationCloner
    ): void {
        $productPosition = 5;
        $draftAttributeTranslationCollection = new ArrayCollection([$draftAttributeTranslation->getWrappedObject()]);
        $productAttributeTranslationCollection = new ArrayCollection([
            $firstProductAttributeTranslation->getWrappedObject(),
            $secondProductAttributeTranslation->getWrappedObject(),
        ]);

        $draftAttributeTranslation->getLocale()->willReturn('pl_PL');
        $draftAttributeTranslation->getName()->willReturn('name');
        $productAttribute->getPosition()->willReturn($productPosition);
        $draftAttribute->getTranslations()->willReturn($draftAttributeTranslationCollection);
        $productAttribute->getTranslations()->willReturn($productAttributeTranslationCollection);

        $attributeTranslationFactory->create()->willReturn($productAttributeTranslation);

        $productAttribute->setPosition($productPosition)->shouldBeCalledOnce();

        $this->update($draftAttribute, $productAttribute);

        $attributeTranslationCloner->clone($draftAttribute)->shouldHaveBeenCalledOnce();
    }
}
