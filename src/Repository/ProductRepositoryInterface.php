<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Pagerfanta\Pagerfanta;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Core\Repository\ProductRepositoryInterface as BaseProductRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;

interface ProductRepositoryInterface extends BaseProductRepositoryInterface
{
    public function save(ProductInterface $product): void;

    /**
     * @return Pagerfanta<object>
     */
    public function findVendorProducts(
        VendorInterface $vendor,
        Request $request,
        ChannelInterface $channel
    ): Pagerfanta;
}
