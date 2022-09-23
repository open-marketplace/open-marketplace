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
use Doctrine\Common\Collections\Collection;
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

        $this->getAttributesByLocale('pl_PL', 'en_US')->shouldIterateAs([$attributeValuePL->getWrappedObject()]);
    }

    public function it_returns_attributes_by_a_fallback_locale_when_there_is_no_value_for_a_given_locale(
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

    public function it_returns_attributes_by_a_fallback_locale_when_there_is_an_empty_value_for_a_given_locale(
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

    public function it_removes_attribute(DraftAttributeValueInterface $attribute): void
    {
        $attribute->setDraft($this)->shouldBeCalled();

        $this->addAttribute($attribute);
        $this->hasAttribute($attribute)->shouldReturn(true);

        $attribute->setDraft(null)->shouldBeCalled();

        $this->removeAttribute($attribute);
        $this->hasAttribute($attribute)->shouldReturn(false);
    }

    public function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    public function it_initializes_attribute_collection_by_default(): void
    {
        $this->getAttributes()->shouldHaveType(Collection::class);
    }

    public function it_adds_attribute(DraftAttributeValueInterface $attribute): void
    {
        $attribute->setDraft($this)->shouldBeCalled();

        $this->addAttribute($attribute);
        $this->hasAttribute($attribute)->shouldReturn(true);
    }

    public function it_returns_attributes_by_a_locale_without_a_base_locale(
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
        $attributeValuePL->getValue()->willReturn('Niebieski');

        $this->addAttribute($attributeValueEN);
        $this->addAttribute($attributeValuePL);

        $this
            ->getAttributesByLocale('pl_PL', 'en_US')
            ->shouldIterateAs([$attributeValuePL->getWrappedObject()])
        ;
    }

    public function it_returns_attributes_by_a_base_locale_when_there_is_no_value_for_a_given_locale_or_a_fallback_locale(
        DraftAttributeInterface $attribute,
        DraftAttributeValueInterface $attributeValueFR,
    ): void {
        $attribute->getCode()->willReturn('colour');

        $attributeValueFR->setDraft($this)->shouldBeCalled();
        $attributeValueFR->getLocaleCode()->willReturn('fr_FR');
        $attributeValueFR->getAttribute()->willReturn($attribute);
        $attributeValueFR->getCode()->willReturn('colour');
        $attributeValueFR->getValue()->willReturn('Bleu');

        $this->addAttribute($attributeValueFR);

        $this
            ->getAttributesByLocale('pl_PL', 'en_US', 'fr_FR')
            ->shouldIterateAs([$attributeValueFR->getWrappedObject()])
        ;
    }

    public function it_returns_attributes_by_a_base_locale_when_there_is_an_empty_value_for_a_given_locale_or_a_fallback_locale(
        DraftAttributeInterface $attribute,
        DraftAttributeValueInterface $attributeValueEN,
        DraftAttributeValueInterface $attributeValuePL,
        DraftAttributeValueInterface $attributeValueFR,
        ): void {
        $attribute->getCode()->willReturn('colour');

        $attributeValueEN->setDraft($this)->shouldBeCalled();
        $attributeValueEN->getLocaleCode()->willReturn('en_US');
        $attributeValueEN->getAttribute()->willReturn($attribute);
        $attributeValueEN->getCode()->willReturn('colour');
        $attributeValueEN->getValue()->willReturn('');

        $attributeValuePL->setDraft($this)->shouldBeCalled();
        $attributeValuePL->getLocaleCode()->willReturn('pl_PL');
        $attributeValuePL->getAttribute()->willReturn($attribute);
        $attributeValuePL->getCode()->willReturn('colour');
        $attributeValuePL->getValue()->willReturn(null);

        $attributeValueFR->setDraft($this)->shouldBeCalled();
        $attributeValueFR->getLocaleCode()->willReturn('fr_FR');
        $attributeValueFR->getAttribute()->willReturn($attribute);
        $attributeValueFR->getCode()->willReturn('colour');
        $attributeValueFR->getValue()->willReturn('Bleu');

        $this->addAttribute($attributeValueEN);
        $this->addAttribute($attributeValuePL);
        $this->addAttribute($attributeValueFR);

        $this
            ->getAttributesByLocale('pl_PL', 'en_US', 'fr_FR')
            ->shouldIterateAs([$attributeValueFR->getWrappedObject()])
        ;
    }

    public function it_initializes_creation_date_by_default(): void
    {
        $this->getCreatedAt()->shouldHaveType(\DateTimeInterface::class);
    }

    public function its_creation_date_is_mutable(\DateTime $creationDate): void
    {
        $this->setCreatedAt($creationDate);
        $this->getCreatedAt()->shouldReturn($creationDate);
    }
}
