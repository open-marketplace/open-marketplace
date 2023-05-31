<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Cloner;

use BitBag\OpenMarketplace\Cloner\AttributeValueCloner;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Factory\ProductAttributeValueFactoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Product\Model\ProductAttributeInterface;
use Sylius\Component\Product\Model\ProductAttributeValueInterface;

final class AttributeValueClonerSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        ProductAttributeValueFactoryInterface $attributeValueFactory
    ): void {
        $this->beConstructedWith($entityManager, $attributeValueFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(AttributeValueCloner::class);
    }

    public function it_clones_attribute_values(
        DraftInterface $productDraft,
        ProductInterface $product,
        DraftAttributeValueInterface $firstAttribute,
        DraftAttributeInterface $draftAttribute,
        ProductAttributeInterface $productAttribute,
        ProductAttributeValueInterface $newProductAttributeValue,
        EntityManagerInterface $entityManager,
        ProductAttributeValueFactoryInterface $attributeValueFactory
    ): void {
        $firstAttribute->getAttribute()->willReturn($draftAttribute);
        $firstAttribute->getLocaleCode()->willReturn('pl_PL');
        $firstAttribute->getValue()->willReturn('name');

        $draftAttributeCollection = new ArrayCollection([$firstAttribute->getWrappedObject()]);
        $productDraft->getAttributes()->willReturn($draftAttributeCollection);

        $attributeValueFactory->create()->willReturn($newProductAttributeValue);
        $draftAttribute->getProductAttribute()->willReturn($productAttribute);

        $this->clone($productDraft, $product);

        $newProductAttributeValue->setSubject($product)->shouldHaveBeenCalledOnce();
        $newProductAttributeValue->setAttribute($productAttribute)->shouldHaveBeenCalledOnce();
        $newProductAttributeValue->setLocaleCode('pl_PL')->shouldHaveBeenCalledOnce();
        $newProductAttributeValue->setValue('name')->shouldHaveBeenCalledOnce();
        $entityManager->persist($newProductAttributeValue)->shouldHaveBeenCalledOnce();
    }
}
