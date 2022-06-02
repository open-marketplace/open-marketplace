<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Pagerfanta\Pagerfanta;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

final class ProductRepository extends EntityRepository implements ProductRepositoryInterface
{
    public function findVendorProducts(VendorInterface $vendor, Request $request): Pagerfanta
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.vendor = :vendor')
            ->setParameter('vendor', $vendor)
        ;

        $currentPage = $request->get('page', 1);
        $limit = $request->get('limit', $_ENV['DEFAULT_VENDOR_PRODUCTS_LIMIT']);

        $pager =  $this->getPaginator($qb);
        $pager->setMaxPerPage($limit);
        $pager->setCurrentPage($currentPage);

        return $pager;
    }
}
