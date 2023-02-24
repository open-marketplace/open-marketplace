<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Doctrine\QueryItemExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface as LegacyQueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class OrderMethodsItemExtension implements QueryItemExtensionInterface
{
    private QueryItemExtensionInterface $baseOrderMethodsItemExtension;

    private SectionProviderInterface $sectionProvider;

    public function __construct(
        QueryItemExtensionInterface $baseOrderMethodsItemExtension,
        SectionProviderInterface $sectionProvider,
    ) {
        $this->baseOrderMethodsItemExtension = $baseOrderMethodsItemExtension;
        $this->sectionProvider = $sectionProvider;
    }

    public function applyToItem(
        QueryBuilder $queryBuilder,
        LegacyQueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        array $identifiers,
        string $operationName = null,
        array $context = []
    ): void {
        $section = $this->sectionProvider->getSection();
        if ($section instanceof ShopVendorApiSection) {
            return;
        }

        $this->baseOrderMethodsItemExtension->applyToItem(
            $queryBuilder,
            $queryNameGenerator,
            $resourceClass,
            $identifiers,
            $operationName,
            $context
        );
    }
}
