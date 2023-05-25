<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Repository;

use ApiTestCase\JsonApiTestCase;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Repository\ProductReviewRepositoryInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use Sylius\Component\Core\Model\ProductReview;

final class ProductReviewRepositoryTest extends JsonApiTestCase
{
    public function test_find_product_reviews_for_vendor(): void
    {
        $this->loadFixturesFromFile('ProductReviewRepositoryTest/found_product_reviews_for_vendor.yml');

        /** @var VendorRepositoryInterface $vendorRepository */
        $vendorRepository = $this->getEntityManager()->getRepository(Vendor::class);
        $vendor = $vendorRepository->findOneBy(['slug' => 'adam-ondra-company']);

        /** @var ProductReviewRepositoryInterface $productReviewRepository */
        $productReviewRepository = $this->getEntityManager()->getRepository(ProductReview::class);
        $queryBuilder = $productReviewRepository->createVendorReviewsQueryBuilder($vendor);

        $productReviews = $queryBuilder->getQuery()->getResult();
        self::assertCount(2, $productReviews);
    }

    public function test_find_product_reviews_for_vendor_not_found(): void
    {
        $this->loadFixturesFromFile('ProductReviewRepositoryTest/not_found_product_reviews_for_vendor.yml');

        /** @var VendorRepositoryInterface $vendorRepository */
        $vendorRepository = $this->getEntityManager()->getRepository(Vendor::class);
        $vendor = $vendorRepository->findOneBy(['slug' => 'alex-honnold-company']);

        /** @var ProductReviewRepositoryInterface $productReviewRepository */
        $productReviewRepository = $this->getEntityManager()->getRepository(ProductReview::class);
        $queryBuilder = $productReviewRepository->createVendorReviewsQueryBuilder($vendor);

        $productReviews = $queryBuilder->getQuery()->getResult();
        self::assertEmpty($productReviews);
    }
}
