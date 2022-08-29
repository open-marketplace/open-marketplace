<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\DraftAttributeFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use PhpSpec\ObjectBehavior;
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

    function it_is_initializable(): void
    {
        $this->shouldHaveType(DraftAttributeFactory::class);
    }

    function it_create_typed_attribute(): void
    {

    }
}
