<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\VendorProvider;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Security;

final class VendorProvider implements VendorProviderInterface
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function provideCurrentVendor(): VendorInterface
    {
        /** @var ShopUserInterface $user */
        $user = $this->security->getUser();
        if (null == $user) {
            throw new UserNotFoundException();
        }
        /** @var VendorInterface $vendor */
        $vendor = $user->getVendor();

        return $vendor;
    }
}
