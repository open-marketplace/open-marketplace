<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor\Entity;

use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUser;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ShopUser as BasicShopUser;

final class ShopUserSpec extends ObjectBehavior
{
    public const ROLE_USER = 'ROLE_USER';

    public const ROLE_VENDOR = 'ROLE_VENDOR';

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShopUser::class);
        $this->shouldHaveType(BasicShopUser::class);
        $this->shouldHaveType(ShopUserInterface::class);
    }

    public function it_get_roles_for_user_without_vendor(): void
    {
        $this->addRole(self::ROLE_USER);

        $this->getRoles()->shouldReturn([self::ROLE_USER]);
    }

    public function it_get_roles_for_user_with_not_verified_vendor(
        VendorInterface $vendor,
    ): void {
        $vendor->isVerified()->willReturn(false);

        $this->addRole(self::ROLE_USER);
        $this->setVendor($vendor);

        $this->getRoles()->shouldReturn([self::ROLE_USER]);
    }

    public function it_get_roles_for_user_with_not_enabled_vendor(
        VendorInterface $vendor,
    ): void {
        $vendor->isVerified()->willReturn(true);
        $vendor->isEnabled()->willReturn(false);

        $this->addRole(self::ROLE_USER);
        $this->setVendor($vendor);

        $this->getRoles()->shouldReturn([self::ROLE_USER]);
    }

    public function it_get_roles_for_user_with_vendor(
        VendorInterface $vendor,
    ): void {
        $vendor->isVerified()->willReturn(true);
        $vendor->isEnabled()->willReturn(true);

        $this->addRole(self::ROLE_USER);
        $this->setVendor($vendor);

        $this->getRoles()->shouldReturn([self::ROLE_USER, self::ROLE_VENDOR]);
    }
}
