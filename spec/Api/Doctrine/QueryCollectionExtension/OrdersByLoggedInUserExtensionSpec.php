<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Doctrine\QueryCollectionExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\ContextAwareQueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface as LegacyQueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\Doctrine\QueryCollectionExtension\OrdersByLoggedInUserExtension;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\OrderInterface;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class OrdersByLoggedInUserExtensionSpec extends ObjectBehavior
{
    public function let(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
    ): void {
        $this->beConstructedWith($baseOrdersByLoggedInUserExtension, $sectionProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrdersByLoggedInUserExtension::class);
        $this->shouldHaveType(ContextAwareQueryCollectionExtensionInterface::class);
    }

    public function it_does_not_filter_if_shop_vendor_api_section(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);

        $this->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class
        );

        $baseOrdersByLoggedInUserExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            null,
            []
        )->shouldNotHaveBeenCalled();
    }

    public function it_filters_if_not_shop_vendor_api_section(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);

        $this->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class
        );

        $baseOrdersByLoggedInUserExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            null,
            []
        )->shouldHaveBeenCalled();
    }
}
