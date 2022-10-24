<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Attribute\AttributeType\AttributeTypeInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftAttributeFactory implements DraftAttributeFactoryInterface
{
    private ServiceRegistryInterface $attributeTypesRegistry;

    private FactoryInterface $factory;

    public function __construct(
        FactoryInterface $factory,
        ServiceRegistryInterface $attributeTypesRegistry
    ) {
        $this->factory = $factory;
        $this->attributeTypesRegistry = $attributeTypesRegistry;
    }

    public function createTyped(
        string $type,
        VendorInterface $vendor
    ): DraftAttributeInterface {
        /** @var AttributeTypeInterface $attributeType */
        $attributeType = $this->attributeTypesRegistry->get($type);
        /** @var DraftAttributeInterface $attribute */
        $attribute = $this->factory->createNew();
        $attribute->setType($type);
        $attribute->setStorageType($attributeType->getStorageType());
        $attribute->setVendor($vendor);

        return $attribute;
    }

    public function createNew(): object
    {
        return $this->factory->createNew();
    }
}
