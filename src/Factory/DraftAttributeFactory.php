<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use Sylius\Component\Attribute\AttributeType\AttributeTypeInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftAttributeFactory implements DraftAttributeFactoryInterface
{
    private ServiceRegistryInterface $attributeTypesRegistry;

    private FactoryInterface $factory;

    private VendorProviderInterface $vendorProvider;

    public function __construct(
        FactoryInterface $factory,
        ServiceRegistryInterface $attributeTypesRegistry,
        VendorProviderInterface $vendorProvider,
        ) {
        $this->factory = $factory;
        $this->attributeTypesRegistry = $attributeTypesRegistry;
        $this->vendorProvider = $vendorProvider;
    }

    public function createTyped(string $type): DraftAttributeInterface
    {
        /** @var AttributeTypeInterface $attributeType */
        $attributeType = $this->attributeTypesRegistry->get($type);
        /** @var DraftAttributeInterface $attribute */
        $attribute = $this->factory->createNew();
        $attribute->setType($type);
        $attribute->setStorageType($attributeType->getStorageType());
        $attribute->setVendor($this->vendorProvider->provideCurrentVendor());

        return $attribute;
    }

    public function createNew(): DraftAttributeInterface
    {
        return $this->factory->createNew();
    }
}
