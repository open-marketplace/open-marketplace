<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ProductListingRepository extends EntityRepository implements ProductListingRepositoryInterface
{
    public function save(ProductListingInterface $productListing): void
    {
        $this->_em->persist($productListing);
        $this->_em->flush();
    }

    public function createByProductDraftQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('pl');
    }

    public function createQueryBuilderWithLatestDraft(): QueryBuilder
    {
        return $this->createQueryBuilder('pl')
            ->innerJoin('pl.productDrafts', 'pd')
            ->leftJoin('pl.productDrafts', 'pd2', 'WITH', 'pd.id < pd2.id')
            ->andWhere('pd2 IS NULL')
            ;
    }

    public function createQueryBuilderByVendor(VendorInterface $vendor): QueryBuilder
    {
        $qb = $this->createQueryBuilderWithLatestDraft();
        $vendorId = $vendor->getId();

        return $qb
            ->andWhere('pl.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ;
    }
}
