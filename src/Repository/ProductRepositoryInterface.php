<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;

interface ProductRepositoryInterface
{
    public function findVendorProducts(VendorInterface $vendor, Request $request): Pagerfanta;
}
