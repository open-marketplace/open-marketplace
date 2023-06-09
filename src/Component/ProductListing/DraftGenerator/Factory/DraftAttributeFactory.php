<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Sylius\Component\Attribute\AttributeType\AttributeTypeInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class DraftAttributeFactory implements DraftAttributeFactoryInterface
{
    public function __construct(
        private FactoryInterface $resourceFactory,
        private ServiceRegistryInterface $attributeTypesRegistry
    ) {
    }

    public function createTyped(
        string $type,
        VendorInterface $vendor
    ): DraftAttributeInterface {
        /** @var AttributeTypeInterface $attributeType */
        $attributeType = $this->attributeTypesRegistry->get($type);
        /** @var DraftAttributeInterface $attribute */
        $attribute = $this->resourceFactory->createNew();
        $attribute->setType($type);
        $attribute->setStorageType($attributeType->getStorageType());
        $attribute->setVendor($vendor);

        return $attribute;
    }

    public function createNew(): object
    {
        return $this->resourceFactory->createNew();
    }
}
