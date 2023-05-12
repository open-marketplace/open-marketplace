<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Repository\ProductListing;

use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;

interface ProductListingRepositoryInterface
{
    public function save(ProductListingInterface $productListing): void;

    /**
     * @return mixed
     */
    public function find(
        int $id,
        ?int $lockMode = null,
        ?int $lockVersion = null
    );

    public function createByProductDraftQueryBuilder(): QueryBuilder;

    public function findByCodeAndVendor(ProductDraftInterface $productDraft, VendorInterface $vendor): ?ProductListingInterface;

    public function findByCodeAndVendorOmitProductListing(
        ProductDraftInterface $productDraft,
        VendorInterface $vendor,
        ProductListingInterface $productListing
    ): ?ProductListingInterface;
}
