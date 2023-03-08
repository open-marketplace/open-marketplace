<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Override\Sylius\Bundle\ApiBundle\ApiPlatform\Bridge\Symfony\Routing;

use ApiPlatform\Core\Api\OperationType;
use ApiPlatform\Core\Bridge\Symfony\Routing\RouteNameResolverInterface;
use ApiPlatform\Core\Exception\InvalidArgumentException;
use Sylius\Bundle\ApiBundle\Provider\PathPrefixProviderInterface;
use Symfony\Component\Routing\RouterInterface;

final class RouteNameResolver implements RouteNameResolverInterface
{
    public function __construct(
        private RouterInterface $router,
        private PathPrefixProviderInterface $pathPrefixProvider,
    ) {
    }

    public function getRouteName(string $resourceClass, $operationType /*, array $context = [] */): string
    {
        $context = 2 < \func_num_args() ? func_get_arg(2) : [];

        $matchingRoutes = [];

        foreach ($this->router->getRouteCollection()->all() as $routeName => $route) {
            $currentResourceClass = $route->getDefault('_api_resource_class');
            $operation = $route->getDefault(sprintf('_api_%s_operation_name', (string) $operationType));
            $methods = $route->getMethods();

            if (
                $resourceClass === $currentResourceClass &&
                null !== $operation &&
                (empty($methods) || \in_array('GET', $methods, true))
            ) {
                if (
                    OperationType::SUBRESOURCE === $operationType &&
                    false === $this->isSameSubresource($context, $route->getDefault('_api_subresource_context'))) {
                    continue;
                }

                $matchingRoutes[$routeName] = $route;
            }
        }

        return $this->returnMatchingRouteName($matchingRoutes, (string) $operationType, $resourceClass);
    }

    private function isSameSubresource(array $context, array $currentContext): bool
    {
        $subresources = array_keys($context['subresource_resources']);
        $currentSubresources = [];

        foreach ($currentContext['identifiers'] as [$class]) {
            $currentSubresources[] = $class;
        }

        return $currentSubresources === $subresources;
    }

    private function returnMatchingRouteName(
        array $matchingRoutes,
        string $operationType,
        string $resourceClass,
        ): string {
        if (1 === count($matchingRoutes)) {
            return array_key_first($matchingRoutes);
        }

        foreach ($matchingRoutes as $routeName => $route) {
            $routePrefix = $this->pathPrefixProvider->getPathPrefix($route->getPath());
            if (null === $routePrefix) {
                return $routeName;
            }

            $requestPrefix = $this->pathPrefixProvider->getCurrentPrefix();
            if (str_contains((string) $requestPrefix, $routePrefix)) {
                return $routeName;
            }
        }

        throw new InvalidArgumentException(
            sprintf('No %s route associated with the type "%s".', $operationType, $resourceClass),
        );
    }
}
