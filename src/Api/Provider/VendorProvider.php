<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Provider;

use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorFactoryInterface;

final class VendorProvider implements VendorProviderInterface
{
    public function __construct(
        private VendorFactoryInterface $vendorFactory
    ) {
    }

    public function provide(ShopUserInterface $shopUser): VendorInterface
    {
        if (null === $vendor = $shopUser->getVendor()) {
            $vendor = $this->vendorFactory->createVendor();
            $vendor->setShopUser($shopUser);
        }

        return $vendor;
    }
}
