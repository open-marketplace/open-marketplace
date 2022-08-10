<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\ORM\EntityRepository;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class DraftAttributeRepository extends EntityRepository implements RepositoryInterface
{
    public function findVendorDraftAttributes(VendorInterface $vendor): array
    {
        $vendorId = $vendor->getId();
        return $this->createQueryBuilder('o')
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ->getQuery()
            ->getResult()
            ;
    }

    public function createPaginator(array $criteria = [], array $sorting = []): iterable
    {
        // TODO: Implement createPaginator() method.
    }

    public function add(ResourceInterface $resource): void
    {
        // TODO: Implement add() method.
    }

    public function remove(ResourceInterface $resource): void
    {
        // TODO: Implement remove() method.
    }
}
