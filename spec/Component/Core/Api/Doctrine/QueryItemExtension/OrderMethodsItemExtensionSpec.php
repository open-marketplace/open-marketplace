<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryItemExtension;

use ApiPlatform\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Delete;
use BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryItemExtension\OrderMethodsItemExtension;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface;
use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\ApiBundle\Serializer\ContextKeys;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Symfony\Component\HttpFoundation\Request;

final class OrderMethodsItemExtensionSpec extends ObjectBehavior
{
    public function let(
        SectionProviderInterface $sectionProvider,
        UserContextInterface $userContext
    ): void {
        $this->beConstructedWith($sectionProvider, $userContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(OrderMethodsItemExtension::class);
        $this->shouldHaveType(QueryItemExtensionInterface::class);
    }

    public function it_does_not_filter_for_not_supported_class(
        SectionProviderInterface $sectionProvider,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $this->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            ProductInterface::class,
            ['id']
        );

        $sectionProvider->getSection()->shouldNotHaveBeenCalled();
    }

    public function it_does_not_filter_if_shop_vendor_api_section(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);

        $this->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id']
        );
    }

    public function it_filters_if_not_shop_vendor_api_section_and_it_is_logged_in_admin_user(
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        UserContextInterface $userContext,
        AdminUserInterface $user,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $queryNameGenerator->generateParameterName('state')->shouldBeCalled()->willReturn('state');

        $queryBuilder->getRootAliases()->willReturn(['root']);

        $userContext->getUser()->willReturn($user);
        $user->getRoles()->willReturn(['ROLE_API_ACCESS']);

        $queryBuilder
            ->andWhere(sprintf('%s.state = :state', 'root'))
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $queryBuilder
            ->setParameter('state', OrderInterface::STATE_CART)
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $this->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id'],
            new Delete(),
            [ContextKeys::HTTP_REQUEST_METHOD_TYPE => Request::METHOD_DELETE],
        );
    }

    public function it_filters_if_not_shop_vendor_api_section_and_it_is_logged_in_shop_user(
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        UserContextInterface $userContext,
        ShopUserInterface $user,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        CustomerInterface $customer
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $queryNameGenerator->generateParameterName('customer')->shouldBeCalled()->willReturn('customer');
        $queryNameGenerator->generateParameterName('state')->shouldBeCalled()->willReturn('state');

        $queryBuilder->getRootAliases()->willReturn(['root']);
        $queryBuilder->andWhere(Argument::any())->willReturn($queryBuilder);

        $userContext->getUser()->willReturn($user);
        $user->getCustomer()->willReturn($customer);
        $customer->getId()->willReturn(1);
        $user->getRoles()->willReturn(['ROLE_USER']);

        $queryBuilder
            ->andWhere('root.mode != :primaryMode')
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $queryBuilder
            ->setParameter('primaryMode', OrderInterface::PRIMARY_ORDER_MODE)
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $queryBuilder
            ->andWhere(sprintf('%s.customer = :customer', 'root'))
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $queryBuilder
            ->setParameter('customer', 1)
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $queryBuilder
            ->andWhere(sprintf('%s.state = :state', 'root'))
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $queryBuilder
            ->setParameter('state', OrderInterface::STATE_CART)
            ->shouldBeCalled()
            ->willReturn($queryBuilder)
        ;

        $this->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            OrderInterface::class,
            ['id'],
            new Delete(),
            [ContextKeys::HTTP_REQUEST_METHOD_TYPE => Request::METHOD_DELETE],
        );
    }
}
