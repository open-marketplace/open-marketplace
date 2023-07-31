<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository\ProductListing;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ProductListingRepository extends EntityRepository implements ProductListingRepositoryInterface
{
    public function save(ListingInterface $productListing): void
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

    public function createQueryBuilderByVendorAndDeleted(VendorInterface $vendor): QueryBuilder
    {
        $qb = $this->createQueryBuilderWithLatestDraft();
        $vendorId = $vendor->getId();

        return $qb
            ->andWhere('pl.vendor = :vendor')
            ->andWhere('pl.removed = :notRemoved')
            ->setParameter('notRemoved', false)
            ->setParameter('vendor', $vendorId)
            ;
    }

    public function findByCodeAndVendor(DraftInterface $productDraft, VendorInterface $vendor): ?ListingInterface
    {
        $qb = $this->createCodeAndVendorQueryBuilder($productDraft, $vendor);

        return $qb->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findByCodeAndVendorOmitProductListing(
        DraftInterface $productDraft,
        VendorInterface $vendor,
        ListingInterface $productListing
    ): ?ListingInterface {
        $qb = $this->createCodeAndVendorQueryBuilder($productDraft, $vendor);

        $qb->andWhere('pl.id != :id')
            ->setParameter('id', $productListing->getId())
        ;

        return $qb->getQuery()
            ->getOneOrNullResult()
            ;
    }

    private function createCodeAndVendorQueryBuilder(DraftInterface $productDraft, VendorInterface $vendor): QueryBuilder
    {
        return $this->createQueryBuilder('pl')
            ->andWhere('pl.code = :code')
            ->andWhere('pl.vendor = :vendor')
            ->setParameter('code', $productDraft->getCode())
            ->setParameter('vendor', $vendor->getId())
            ;
    }
}
