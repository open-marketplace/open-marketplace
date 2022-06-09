<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Pagerfanta\Pagerfanta;
use Sylius\Component\Channel\Model\ChannelInterface;
use Symfony\Component\HttpFoundation\Request;

interface ProductRepositoryInterface
{
    /**
     * @return Pagerfanta<object>
     */
    public function findVendorProducts(
        VendorInterface $vendor,
        Request $request,
        ChannelInterface $channel
    ): Pagerfanta;
}
