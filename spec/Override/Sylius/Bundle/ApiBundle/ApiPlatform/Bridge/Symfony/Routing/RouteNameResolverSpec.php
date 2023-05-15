<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Override\Sylius\Bundle\ApiBundle\ApiPlatform\Bridge\Symfony\Routing;

use ApiPlatform\Core\Api\OperationType;
use ApiPlatform\Core\Bridge\Symfony\Routing\RouteNameResolverInterface;
use BitBag\OpenMarketplace\Override\Sylius\Bundle\ApiBundle\ApiPlatform\Bridge\Symfony\Routing\RouteNameResolver;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Provider\PathPrefixProviderInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;

final class RouteNameResolverSpec extends ObjectBehavior
{
    public function let(
        RouterInterface $router,
        PathPrefixProviderInterface $pathPrefixProvider,
    ) {
        $this->beConstructedWith($router, $pathPrefixProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(RouteNameResolver::class);
        $this->shouldHaveType(RouteNameResolverInterface::class);
    }

    public function it_gets_route_name_for_item_route_with_no_matching_route(
        RouterInterface $router,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('certain_collection_route', new Route('/certain/collection/path', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_collection_operation_name' => 'certain_collection_op',
        ]));

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('getRouteName', ['AppBundle\Entity\User', OperationType::ITEM])
        ;
    }

    public function it_gets_route_name_for_item_route(
        RouterInterface $router,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('certain_collection_route', new Route('/certain/collection/path', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_collection_operation_name' => 'certain_collection_op',
        ]));
        $routeCollection->add('certain_item_route', new Route('/certain/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'certain_item_op',
        ]));

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::ITEM)->shouldReturn('certain_item_route');
    }

    public function it_gets_route_name_for_collection_route_with_no_matching_route(
        RouterInterface $router,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('certain_item_route', new Route('/certain/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'certain_item_op',
        ]));

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('getRouteName', ['AppBundle\Entity\User', OperationType::COLLECTION])
        ;
    }

    public function it_gets_route_name_for_collection_route(
        RouterInterface $router,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('certain_item_route', new Route('/certain/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'certain_item_op',
        ]));
        $routeCollection->add('certain_collection_route', new Route('/certain/collection/path', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_collection_operation_name' => 'certain_collection_op',
        ]));

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::COLLECTION)->shouldReturn('certain_collection_route');
    }

    public function it_gets_route_name_for_subresource_route(
        RouterInterface $router,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('a_certain_subresource_route', new Route('/a/certain/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_subresource_operation_name' => 'certain_other_item_op',
            '_api_subresource_context' => ['identifiers' => ['id' => ['bar', 'id']]],
        ]));
        $routeCollection->add('b_certain_subresource_route', new Route('/b/certain/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_subresource_operation_name' => 'certain_item_op',
            '_api_subresource_context' => ['identifiers' => ['id' => ['foo', 'id']]],
        ]));
        $routeCollection->add('certain_collection_route', new Route('/certain/collection/path', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_collection_operation_name' => 'certain_collection_op',
        ]));

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName(
            'AppBundle\Entity\User',
            OperationType::SUBRESOURCE,
            ['subresource_resources' => ['foo' => 1]]
        )->shouldReturn('b_certain_subresource_route');
    }

    public function it_gets_route_name_for_item_route_if_only_one(
        RouterInterface $router,
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('get_collection', new Route('/admin/item/path', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_collection_operation_name' => 'get_collection',
        ]));
        $routeCollection->add('get_item', new Route('/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::ITEM)->shouldReturn('get_item');
    }

    public function it_gets_route_name_if_has_path_prefix_null(
        RouterInterface $router,
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('admin_get', new Route('/admin/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $routeCollection->add('vendor_get', new Route('/vendor/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $pathPrefixProvider->getPathPrefix('/admin/item/path/{id}')->willReturn(null);
        $pathPrefixProvider->getPathPrefix('/vendor/item/path/{id}')->willReturn('vendor');

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::ITEM)->shouldReturn('admin_get');
    }

    public function it_gets_admin_route_name_for_item_route_if_current_prefix_admin(
        RouterInterface $router,
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('admin_get', new Route('/admin/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $routeCollection->add('vendor_get', new Route('/vendor/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));
        $routeCollection->add('shop_get', new Route('/shop/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $pathPrefixProvider->getPathPrefix('/admin/item/path/{id}')->willReturn('admin');
        $pathPrefixProvider->getPathPrefix('/vendor/item/path/{id}')->willReturn('vendor');
        $pathPrefixProvider->getPathPrefix('/shop/item/path/{id}')->willReturn('shop');
        $pathPrefixProvider->getCurrentPrefix()->willReturn('admin');

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::ITEM)->shouldReturn('admin_get');
    }

    public function it_gets_shop_route_name_for_item_route_if_current_prefix_shop(
        RouterInterface $router,
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('admin_get', new Route('/admin/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $routeCollection->add('vendor_get', new Route('/vendor/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));
        $routeCollection->add('shop_get', new Route('/shop/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $pathPrefixProvider->getPathPrefix('/admin/item/path/{id}')->willReturn('admin');
        $pathPrefixProvider->getPathPrefix('/vendor/item/path/{id}')->willReturn('vendor');
        $pathPrefixProvider->getPathPrefix('/shop/item/path/{id}')->willReturn('shop');
        $pathPrefixProvider->getCurrentPrefix()->willReturn('shop');

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::ITEM)->shouldReturn('shop_get');
    }

    public function it_gets_vendor_route_name_for_item_route_if_current_prefix_contains_vendor(
        RouterInterface $router,
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $routeCollection = new RouteCollection();
        $routeCollection->add('admin_get', new Route('/admin/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $routeCollection->add('vendor_get', new Route('/vendor/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));
        $routeCollection->add('shop_get', new Route('/shop/item/path/{id}', [
            '_api_resource_class' => 'AppBundle\Entity\User',
            '_api_item_operation_name' => 'get_item',
        ]));

        $pathPrefixProvider->getPathPrefix('/admin/item/path/{id}')->willReturn('admin');
        $pathPrefixProvider->getPathPrefix('/vendor/item/path/{id}')->willReturn('vendor');
        $pathPrefixProvider->getPathPrefix('/shop/item/path/{id}')->willReturn('shop');
        $pathPrefixProvider->getCurrentPrefix()->willReturn('shop_vendor');

        $router->getRouteCollection()->willReturn($routeCollection);

        $this->getRouteName('AppBundle\Entity\User', OperationType::ITEM)->shouldReturn('vendor_get');
    }
}
