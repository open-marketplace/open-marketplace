<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository;

use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;

interface ProductReviewRepositoryInterface
{
    public function createVendorReviewsQueryBuilder(VendorInterface $vendor): QueryBuilder;
}
