<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryExtension\Vendor;

use ApiPlatform\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Metadata\Operation;
use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\FilterVendorStrategy;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Messaging\Entity\Conversation;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class VendorContextExtension implements QueryCollectionExtensionInterface
{
    public function __construct(
        private iterable $filterVendorStrategies,
        private VendorContextInterface $vendorContext,
        private SectionProviderInterface $uriBasedSectionContext,
    ) {
        $this->filterVendorStrategies = $filterVendorStrategies instanceof \Traversable
            ? iterator_to_array($filterVendorStrategies)
            : $filterVendorStrategies;
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
        if (Conversation::class === $resourceClass) {
            return;
        }
        $this->filterByVendorIfApply($queryBuilder, $resourceClass);
    }

    public function filterByVendorIfApply(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if (null === $filterVendorStrategy = $this->getSupportedStrategy($resourceClass)) {
            return;
        }

        if (false === $this->uriBasedSectionContext->getSection() instanceof ShopVendorApiSection) {
            return;
        }

        if (null === $vendor = $this->vendorContext->getVendor()) {
            $this->filterForEmptyResult($queryBuilder);
        } else {
            $filterVendorStrategy->filterByVendor($queryBuilder, $vendor);
        }
    }

    private function filterForEmptyResult(QueryBuilder $queryBuilder): void
    {
        $queryBuilder->andWhere('1=0');
    }

    private function getSupportedStrategy(string $class): ?FilterVendorStrategy
    {
        /** @var FilterVendorStrategy $filterVendorStrategy */
        foreach ($this->filterVendorStrategies as $filterVendorStrategy) {
            if ($filterVendorStrategy->supports($class)) {
                return $filterVendorStrategy;
            }
        }

        return null;
    }
}
