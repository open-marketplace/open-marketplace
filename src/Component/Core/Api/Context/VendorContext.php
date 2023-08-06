<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Api\Context;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;

final class VendorContext implements VendorContextInterface
{
    public function __construct(
        private UserContextInterface $userContext
    ) {
    }

    public function getVendor(): ?VendorInterface
    {
        $shopUser = $this->userContext->getUser();

        if (!$shopUser instanceof ShopUserInterface) {
            return null;
        }

        return $shopUser->getVendor();
    }
}
