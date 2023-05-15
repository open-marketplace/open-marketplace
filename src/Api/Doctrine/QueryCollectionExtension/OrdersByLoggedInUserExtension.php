<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Doctrine\QueryCollectionExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\ContextAwareQueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface as LegacyQueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class OrdersByLoggedInUserExtension implements ContextAwareQueryCollectionExtensionInterface
{
    private ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension;

    private SectionProviderInterface $sectionProvider;

    private UserContextInterface $userContext;

    public function __construct(
        ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        SectionProviderInterface $sectionProvider,
        UserContextInterface $userContext
    ) {
        $this->baseOrdersByLoggedInUserExtension = $baseOrdersByLoggedInUserExtension;
        $this->sectionProvider = $sectionProvider;
        $this->userContext = $userContext;
    }

    public function applyToCollection(
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): void {
        if (!is_a($resourceClass, OrderInterface::class, true)) {
            return;
        }

        if ($this->sectionProvider->getSection() instanceof ShopVendorApiSection) {
            return;
        }

        if ($this->userContext->getUser() instanceof ShopUserInterface) {
            $rootAlias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->andWhere(sprintf('%s.primaryOrder is NOT NULL', $rootAlias));
        }

        $this->baseOrdersByLoggedInUserExtension->applyToCollection(
            $queryBuilder,
            $queryNameGenerator,
            $resourceClass,
            $operationName,
            $context
        );
    }
}
