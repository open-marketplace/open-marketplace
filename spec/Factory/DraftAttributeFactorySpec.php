<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Factory\DraftAttributeFactory;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Provider\VendorProviderInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Attribute\AttributeType\AttributeTypeInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftAttributeFactorySpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $factory,
        ServiceRegistryInterface $attributeTypesRegistry,
        VendorProviderInterface $vendorProvider,
        ): void {
        $this->beConstructedWith($factory, $attributeTypesRegistry, $vendorProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(DraftAttributeFactory::class);
    }

    public function it_creates_typed_attribute(
        ServiceRegistryInterface $attributeTypesRegistry,
        AttributeTypeInterface $attributeType,
        VendorProviderInterface $vendorProvider,
        FactoryInterface $factory,
        DraftAttributeInterface $attribute,
        DraftAttributeInterface $typedAttribute,
        VendorInterface $vendor
    ): void {
        $type = 'text';
        $storageType = 'text';

        $attributeTypesRegistry->get($type)->willReturn($attributeType);
        $attributeType->getStorageType()->willReturn($storageType);
        $factory->createNew()->willReturn($attribute);
        $vendorProvider->provideCurrentVendor()->willReturn($vendor);

        $attribute->setType($type)->shouldBeCalledOnce();
        $attribute->setStorageType($storageType)->shouldBeCalledOnce();
        $attribute->setVendor($vendor)->shouldBeCalledOnce();

        $item = $this->createTyped($type, $vendor);

        $item->shouldBeAnInstanceOf(DraftAttributeInterface::class);
    }
}
