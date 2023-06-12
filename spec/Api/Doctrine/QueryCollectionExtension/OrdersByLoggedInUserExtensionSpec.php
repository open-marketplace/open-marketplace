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
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\AdminUserInterface;

final class OrdersByLoggedInUserExtensionSpec extends ObjectBehavior
{
    public function let(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        UserContextInterface $userContext
    ): void {
        $this->beConstructedWith($baseOrdersByLoggedInUserExtension, $sectionProvider, $userContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrdersByLoggedInUserExtension::class);
        $this->shouldHaveType(ContextAwareQueryCollectionExtensionInterface::class);
    }

    public function it_does_not_filter_for_not_supported_class(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $this->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            ProductInterface::class
        );

        $sectionProvider->getSection()->shouldNotHaveBeenCalled();
        $baseOrdersByLoggedInUserExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            null,
            []
        )->shouldNotHaveBeenCalled();
    }

    public function it_does_not_filter_if_shop_vendor_api_section(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator
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

    public function it_filters_if_not_shop_vendor_api_section_and_it_is_logged_in_admin_user(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        UserContextInterface $userContext,
        AdminUserInterface $user,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $userContext->getUser()->willReturn($user);

        $this->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class
        );

        $queryBuilder->getRootAliases()->shouldNotHaveBeenCalled();
        $queryBuilder->andWhere(Argument::any())->shouldNotHaveBeenCalled();
        $baseOrdersByLoggedInUserExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            null,
            []
        )->shouldHaveBeenCalled();
    }

    public function it_filters_if_not_shop_vendor_api_section_and_it_is_logged_in_shop_user(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        UserContextInterface $userContext,
        ShopUserInterface $user,
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $userContext->getUser()->willReturn($user);
        $queryBuilder->getRootAliases()->willReturn(['root']);
        $queryBuilder->andWhere(Argument::any())->willReturn($queryBuilder);

        $this->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class
        );

        $queryBuilder->andWhere('root.mode != :primaryMode')->shouldHaveBeenCalled();
        $queryBuilder->setParameter('primaryMode', OrderInterface::PRIMARY_ORDER_MODE)->shouldHaveBeenCalled();

        $baseOrdersByLoggedInUserExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            null,
            []
        )->shouldHaveBeenCalled();
    }
}
