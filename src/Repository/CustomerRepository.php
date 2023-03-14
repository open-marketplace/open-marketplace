<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository as BaseCustomerRepository;
use Sylius\Component\Core\Model\CustomerInterface;

class CustomerRepository extends BaseCustomerRepository implements CustomerRepositoryInterface
{
    public function findVendorCustomers(VendorInterface $vendor): QueryBuilder
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('c')
            ->innerJoin('c.orders', 'o', )
            ->andWhere('o.vendor = :vendor')
            ->setParameter('vendor', $vendorId)
            ;
    }

    public function findCustomerForVendor(VendorInterface $vendor, string $id): ?CustomerInterface
    {
        $vendorId = $vendor->getId();

        return $this->createQueryBuilder('c')
            ->innerJoin('c.orders', 'o')
            ->andWhere('o.vendor = :vendor')
            ->andWhere('c.id = :id')
            ->setParameter('vendor', $vendorId)
            ->setParameter('id', $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
