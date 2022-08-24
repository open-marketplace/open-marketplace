<?php
/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeValueInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraft;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;

final class ProductDraftSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(ProductDraft::class);
    }

    public function it_returns_id(): void
    {
        $this->setId(1);
        $this->getId()->shouldBeInt();
    }

    public function it_returns_translation(): void
    {
        $this->getTranslations()->shouldBeAnInstanceOf(ArrayCollection::class);
    }

    public function it_returns_image(): void
    {
        $this->getImages()->shouldBeAnInstanceOf(ArrayCollection::class);
    }

    public function it_gets_attribute_by_locale(
        DraftAttributeValueInterface $attributeValuePL,
        DraftAttributeValueInterface $attributeValueEN,
        DraftAttributeInterface $attribute,
    ): void {
        $attribute->getCode()->willReturn('colour');

        $attributeValuePL->setDraft($this)->shouldBeCalled();
        $attributeValuePL->getLocaleCode()->willReturn('pl_PL');
        $attributeValuePL->getAttribute()->willReturn($attribute);
        $attributeValuePL->getCode()->willReturn('colour');
        $attributeValuePL->getValue()->willReturn('Niebieski');

        $attributeValueEN->setDraft($this)->shouldBeCalled();
        $attributeValueEN->getLocaleCode()->willReturn('en_US');
        $attributeValueEN->getAttribute()->willReturn($attribute);
        $attributeValueEN->getCode()->willReturn('colour');
        $attributeValueEN->getValue()->willReturn('Blue');

        $this->addAttribute($attributeValuePL);
        $this->addAttribute($attributeValueEN);

        $this->getAttributesByLocale('pl_PL',"en_US")->shouldIterateAs([$attributeValuePL->getWrappedObject()]);
    }

    function it_returns_attributes_by_a_fallback_locale_when_there_is_no_value_for_a_given_locale(
        DraftAttributeInterface $attribute,
        DraftAttributeValueInterface $attributeValueEN,
    ): void {
        $attribute->getCode()->willReturn('colour');

        $attributeValueEN->setDraft($this)->shouldBeCalled();
        $attributeValueEN->getLocaleCode()->willReturn('en_US');
        $attributeValueEN->getAttribute()->willReturn($attribute);
        $attributeValueEN->getCode()->willReturn('colour');
        $attributeValueEN->getValue()->willReturn('Blue');

        $this->addAttribute($attributeValueEN);

        $this
            ->getAttributesByLocale('pl_PL', 'en_US')
            ->shouldIterateAs([$attributeValueEN->getWrappedObject()])
        ;
    }

    function it_returns_attributes_by_a_fallback_locale_when_there_is_an_empty_value_for_a_given_locale(
        DraftAttributeInterface $attribute,
        DraftAttributeValueInterface $attributeValueEN,
        DraftAttributeValueInterface $attributeValuePL,
    ): void {
        $attribute->getCode()->willReturn('colour');

        $attributeValueEN->setDraft($this)->shouldBeCalled();
        $attributeValueEN->getLocaleCode()->willReturn('en_US');
        $attributeValueEN->getAttribute()->willReturn($attribute);
        $attributeValueEN->getCode()->willReturn('colour');
        $attributeValueEN->getValue()->willReturn('Blue');

        $attributeValuePL->setDraft($this)->shouldBeCalled();
        $attributeValuePL->getLocaleCode()->willReturn('pl_PL');
        $attributeValuePL->getAttribute()->willReturn($attribute);
        $attributeValuePL->getCode()->willReturn('colour');
        $attributeValuePL->getValue()->willReturn('');

        $this->addAttribute($attributeValueEN);
        $this->addAttribute($attributeValuePL);

        $this
            ->getAttributesByLocale('pl_PL', 'en_US')
            ->shouldIterateAs([$attributeValueEN->getWrappedObject()])
        ;
    }

    function it_removes_attribute(DraftAttributeValueInterface $attribute): void
    {
        $attribute->setDraft($this)->shouldBeCalled();

        $this->addAttribute($attribute);
        $this->hasAttribute($attribute)->shouldReturn(true);

        $attribute->setDraft(null)->shouldBeCalled();

        $this->removeAttribute($attribute);
        $this->hasAttribute($attribute)->shouldReturn(false);
    }
}
