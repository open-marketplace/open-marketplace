<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity;

use BitBag\OpenMarketplace\Model\ShopUser\ShopUserTrait;
use Sylius\Component\Core\Model\ShopUser as BaseShopUser;

class ShopUser extends BaseShopUser implements ShopUserInterface
{
    use ShopUserTrait;

    private const ROLE_VENDOR = 'ROLE_VENDOR';

    public function getRoles(): array
    {
        $roles = $this->roles;

        $vendor = $this->getVendor();
        if (null !== $vendor && $vendor->isVerified() && $vendor->isEnabled()) {
            $roles[] = self::ROLE_VENDOR;
        }

        return array_unique($roles);
    }
}
