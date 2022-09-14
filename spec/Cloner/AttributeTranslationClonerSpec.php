<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\AttributeTranslationCloner;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductAttributeTranslationFactoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeTranslationInterface;

final class AttributeTranslationClonerSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory
    ): void {
        $this->beConstructedWith($entityManager, $attributeTranslationFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AttributeTranslationCloner::class);
    }

    public function it_clones_translation(
        EntityManagerInterface $entityManager,
        ProductAttributeTranslationFactoryInterface $attributeTranslationFactory,
        DraftAttributeInterface $draftAttribute,
        ProductAttributeInterface $productAttribute,
        DraftAttributeTranslationInterface $draftAttributeTranslation,
        ProductAttributeTranslationInterface $newProductAttributeTranslation
    ): void {

        $draftAttributeCollection = new ArrayCollection([$draftAttributeTranslation->getWrappedObject()]);

        $draftAttribute->getTranslations()->willReturn($draftAttributeCollection);
        $draftAttributeTranslation->getLocale()->willReturn("pl_PL");
        $draftAttributeTranslation->getName()->willReturn("name");
        $draftAttribute->getProductAttribute()->willReturn($productAttribute);

        $attributeTranslationFactory->create()->willReturn($newProductAttributeTranslation);

        $this->clone($draftAttribute);

        $newProductAttributeTranslation->setLocale("pl_PL")->shouldHaveBeenCalledOnce();
        $newProductAttributeTranslation->setName("name")->shouldHaveBeenCalledOnce();
        $newProductAttributeTranslation->setTranslatable($productAttribute)->shouldHaveBeenCalledOnce();
    }
}
