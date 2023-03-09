<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Doctrine\QueryItemExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface as LegacyQueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\Doctrine\QueryItemExtension\OrderGetMethodItemExtension;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class OrderGetMethodItemExtensionSpec extends ObjectBehavior
{
    public function let(
        QueryItemExtensionInterface $baseOrderGetMethodItemExtension,
        SectionProviderInterface $sectionProvider,
    ): void {
        $this->beConstructedWith($baseOrderGetMethodItemExtension, $sectionProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderGetMethodItemExtension::class);
        $this->shouldHaveType(QueryItemExtensionInterface::class);
    }

    public function it_does_not_filter_if_shop_vendor_api_section(
        QueryItemExtensionInterface $baseOrderGetMethodItemExtension,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);

        $this->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id']
        );

        $baseOrderGetMethodItemExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id'],
            null,
            []
        )->shouldNotHaveBeenCalled();
    }

    public function it_filters_if_not_shop_vendor_api_section(
        QueryItemExtensionInterface $baseOrderGetMethodItemExtension,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);

        $this->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id']
        );

        $baseOrderGetMethodItemExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id'],
            null,
            []
        )->shouldHaveBeenCalled();
    }
}
