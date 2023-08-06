<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy;

use BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\AbstractFilterStrategy;
use BitBag\OpenMarketplace\Component\Core\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\FilterVendorStrategy;
use BitBag\OpenMarketplace\Component\Messaging\Entity\ConversationInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;

final class ConversationFilterStrategy extends AbstractFilterStrategy implements FilterVendorStrategy
{
    protected function getSupportedClasses(): array
    {
        return [
            ConversationInterface::class,
        ];
    }

    public function filterByVendor(QueryBuilder $queryBuilder, VendorInterface $vendor): void
    {
        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->andWhere(sprintf('%s.shopUser', $rootAlias) . ' = :currentShopUser');
        $queryBuilder->setParameter('currentShopUser', $vendor->getShopUser());
    }
}
