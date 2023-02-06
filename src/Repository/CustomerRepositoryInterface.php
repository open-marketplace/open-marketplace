<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Core\Model\CustomerInterface;

interface CustomerRepositoryInterface
{
    public function findVendorCustomers(VendorInterface $vendor): QueryBuilder;

    public function findCustomerForVendor(VendorInterface $vendor, string $id): ?CustomerInterface;
}
