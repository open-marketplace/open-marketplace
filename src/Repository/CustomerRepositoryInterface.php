<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

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
