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
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class OrdersByLoggedInUserExtension implements ContextAwareQueryCollectionExtensionInterface
{
    public function __construct(
        private ContextAwareQueryCollectionExtensionInterface $baseOrdersByLoggedInUserExtension,
        private SectionProviderInterface $uriBasedSectionContext,
    ) {
    }

    public function applyToCollection(
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): void {
        $section = $this->uriBasedSectionContext->getSection();
        if ($section instanceof ShopVendorApiSection) {
            return;
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
