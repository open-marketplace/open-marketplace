<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Vendor;

use BitBag\OpenMarketplace\Component\Core\Vendor\Exception\ShopUserHasNoVendorContextException;
use BitBag\OpenMarketplace\Component\Core\Vendor\Exception\ShopUserNotFoundException;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\VendorContext;
use BitBag\OpenMarketplace\Component\Vendor\VendorContextInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Security\Core\Security;

final class VendorContextSpec extends ObjectBehavior
{
    public function let(
        Security $security
    ): void {
        $this->beConstructedWith($security);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorContext::class);
        $this->shouldImplement(VendorContextInterface::class);
    }

    public function it_throws_exception_when_no_user_got_from_security(
        Security $security
    ): void {
        $security->getUser()->willReturn(null);

        $this->shouldThrow(ShopUserNotFoundException::class)
            ->during('getVendor', []);
    }

    public function it_throws_exception_when_shop_user_has_no_vendor_context(
        Security $security,
        ShopUserInterface $shopUser
    ): void {
        $security->getUser()->willReturn($shopUser);

        $shopUser->getVendor()->willReturn(null);

        $this->shouldThrow(ShopUserHasNoVendorContextException::class)
            ->during('getVendor', []);
    }

    public function it_returns_vendor_from_shop_user_context(
        Security $security,
        ShopUserInterface $shopUser,
        VendorInterface $vendor
    ): void {
        $security->getUser()->willReturn($shopUser);

        $shopUser->getVendor()->willReturn($vendor);

        $this->getVendor()
            ->shouldReturn($vendor);
    }
}
