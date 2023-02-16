<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Doctrine;

use ApiPlatform\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

final class ProductVariantCurrentVendorExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    public function __construct(
        private VendorContextInterface $vendorContext,
        private SectionProviderInterface $uriBasedSectionContext,
    ) {
    }

    public function applyToCollection(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        Operation $operation = null,
        array $context = []
    ): void {
        $this->filterByVendorIfApply($queryBuilder, $resourceClass);
    }

    public function applyToItem(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        array $identifiers,
        Operation $operation = null,
        array $context = []
    ): void {
        $this->filterByVendorIfApply($queryBuilder, $resourceClass);
    }

    public function filterByVendorIfApply(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if (false === is_a($resourceClass, ProductVariantInterface::class, true)) {
            return;
        }

        if (false === $this->uriBasedSectionContext->getSection() instanceof ShopVendorApiSection) {
            return;
        }

        if (null === $vendor = $this->vendorContext->getVendor()) {
            $this->filterForEmptyResult($queryBuilder);
        } else {
            $this->filterByVendor($queryBuilder, $vendor);
        }
    }

    private function filterForEmptyResult(QueryBuilder $queryBuilder): void
    {
        $queryBuilder->andWhere('1=0');
    }

    private function filterByVendor(QueryBuilder $queryBuilder, VendorInterface $vendor): void
    {
        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->innerJoin(sprintf('%s.product', $rootAlias), 'p');
        $queryBuilder->andWhere('p.vendor = :currentVendor');
        $queryBuilder->setParameter('currentVendor', $vendor->getId());
    }
}
