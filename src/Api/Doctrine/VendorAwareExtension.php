<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\ContextAwareQueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\VendorAwareInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class VendorAwareExtension implements ContextAwareQueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    public function __construct(
        private VendorContextInterface $vendorContext,
        private SectionProviderInterface $sectionProvider,
    ) {
    }

    public function applyToCollection(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): void {
        $this->filterByVendorIfApply($resourceClass, $operationName, $queryBuilder);
    }

    public function applyToItem(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        array $identifiers,
        string $operationName = null,
        array $context = []
    ): void {
        $this->filterByVendorIfApply($resourceClass, $operationName, $queryBuilder);
    }

    public function filterByVendorIfApply(
        string $resourceClass,
        ?string $operationName,
        QueryBuilder $queryBuilder
    ): void {
        if (!is_a($resourceClass, VendorAwareInterface::class, true)) {
            return;
        }

        if (false === $this->sectionProvider->getSection() instanceof ShopVendorApiSection) {
            return;
        }

        if (null === $vendor = $this->vendorContext->getVendor()) {
            $this->filterForEmptyResult($queryBuilder);
        } else {
            $this->filterByVendor($queryBuilder, $vendor);
        }
    }

    public function filterForEmptyResult(QueryBuilder $queryBuilder): void
    {
        $queryBuilder->andWhere('1=0');
    }

    public function filterByVendor(QueryBuilder $queryBuilder, ?VendorInterface $vendor): void
    {
        $rootAlias = $queryBuilder->getRootAliases()[0];

        $queryBuilder
            ->andWhere(sprintf('%s.vendor = :account_vendor', $rootAlias))
            ->setParameter('account_vendor', $vendor);
    }
}
