<?php

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Product\Repository;

use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Core\Repository\ProductReviewRepositoryInterface as BaseProductReviewRepositoryInterface;

interface ProductReviewRepositoryInterface extends BaseProductReviewRepositoryInterface
{
    public function createVendorReviewsQueryBuilder(VendorInterface $vendor): QueryBuilder;
}
