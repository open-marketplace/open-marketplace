<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryItemExtension;

use ApiPlatform\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\AdminUserInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\User\UserInterface;

final class OrderGetMethodItemExtension implements QueryItemExtensionInterface
{
    public function __construct(
        private SectionProviderInterface $sectionProvider,
        private UserContextInterface $userContext
    ) {
    }

    public function applyToItem(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        array $identifiers,
        Operation $operation = null,
        array $context = []
    ): void {
        if (!is_a($resourceClass, OrderInterface::class, true)) {
            return;
        }

        if ($this->sectionProvider->getSection() instanceof ShopVendorApiSection) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $user = $this->userContext->getUser();

        if ($user instanceof ShopUserInterface) {
            $queryBuilder
                ->andWhere(sprintf('%s.mode != :primaryMode', $rootAlias))
                ->setParameter('primaryMode', \BitBag\OpenMarketplace\Component\Order\Entity\OrderInterface::PRIMARY_ORDER_MODE)
            ;
        }

        $this->applyToItemForGetMethod($user, $queryBuilder, $queryNameGenerator, $rootAlias);
    }

    private function applyToItemForGetMethod(
        ?UserInterface $user,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $rootAlias,
        ): void {
        if (null === $user) {
            $queryBuilder
                ->leftJoin(sprintf('%s.customer', $rootAlias), 'customer')
                ->leftJoin('customer.user', 'user')
                ->andWhere($queryBuilder->expr()->orX(
                    'user IS NULL',
                    sprintf('%s.customer IS NULL', $rootAlias),
                    $queryBuilder->expr()->andX(
                        sprintf('%s.customer IS NOT NULL', $rootAlias),
                        sprintf('%s.createdByGuest = true', $rootAlias),
                    ),
                ))
            ;

            return;
        }

        if ($user instanceof ShopUserInterface && in_array('ROLE_USER', $user->getRoles(), true)) {
            $customerParameterName = $queryNameGenerator->generateParameterName('customer');
            /** @var ?CustomerInterface $customer */
            $customer = $user->getCustomer();

            if (null === $customer) {
                return;
            }

            $queryBuilder
                ->andWhere(sprintf('%s.customer = :%s', $rootAlias, $customerParameterName))
                ->setParameter($customerParameterName, $customer->getId())
            ;

            return;
        }

        if ($user instanceof AdminUserInterface && in_array('ROLE_API_ACCESS', $user->getRoles(), true)) {
            //admin has access to get all orders
            return;
        }

        throw new AccessDeniedHttpException('Requested method is not allowed.');
    }
}
