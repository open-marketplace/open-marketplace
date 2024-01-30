<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryItemExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\ApiBundle\Serializer\ContextKeys;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Symfony\Component\HttpFoundation\Request;

final class OrderShopUserItemExtension implements QueryItemExtensionInterface
{
    public function __construct(private UserContextInterface $userContext)
    {
    }

    public function applyToItem(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        array $identifiers,
        string $operationName = null,
        array $context = [],
        ): void {
        if (!is_a($resourceClass, OrderInterface::class, true)) {
            return;
        }

        $user = $this->userContext->getUser();

        if (!$user instanceof ShopUserInterface) {
            return;
        }

        /** @var ?CustomerInterface $customer */
        $customer = $user->getCustomer();

        if (null === $customer) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $customerParameterName = $queryNameGenerator->generateParameterName('customer');

        $queryBuilder
            ->andWhere(sprintf('%s.customer = :%s', $rootAlias, $customerParameterName))
            ->setParameter($customerParameterName, $user->getCustomer()->getId())
        ;

        $httpRequestMethodType = $context[ContextKeys::HTTP_REQUEST_METHOD_TYPE];

        if (
            'shop_select_payment_method' === $operationName ||
            'shop_account_change_payment_method' === $operationName ||
            'vendor_cancel' === $operationName ||
            Request::METHOD_GET === $httpRequestMethodType
        ) {
            return;
        }

        $this->filterCart($queryBuilder, $queryNameGenerator, $rootAlias);
    }

    private function filterCart(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $rootAlias
    ): void {
        $stateParameterName = $queryNameGenerator->generateParameterName('state');

        $queryBuilder
            ->andWhere(sprintf('%s.state = :%s', $rootAlias, $stateParameterName))
            ->setParameter($stateParameterName, OrderInterface::STATE_CART)
        ;
    }
}
