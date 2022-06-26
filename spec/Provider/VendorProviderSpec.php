<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Provider;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\ShopUserHasNoVendorContextException;
use BitBag\SyliusMultiVendorMarketplacePlugin\Exception\ShopUserNotFoundException;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProvider;
use BitBag\SyliusMultiVendorMarketplacePlugin\Provider\VendorProviderInterface;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Security\Core\Security;

final class VendorProviderSpec extends ObjectBehavior
{
    public function let(
        Security $security
    ): void {
        $this->beConstructedWith($security);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorProvider::class);
        $this->shouldImplement(VendorProviderInterface::class);
    }

    public function it_throws_exception_when_no_user_got_from_security(
        Security $security
    ): void {
        $security->getUser()->willReturn(null);

        $this->shouldThrow(ShopUserNotFoundException::class)
            ->during('provideCurrentVendor', []);
    }

    public function it_throws_exception_when_shop_user_has_no_vendor_context(
        Security $security,
        ShopUserInterface $shopUser
    ): void {
        $security->getUser()->willReturn($shopUser);

        $shopUser->getVendor()->willReturn(null);

        $this->shouldThrow(ShopUserHasNoVendorContextException::class)
            ->during('provideCurrentVendor', []);
    }

    public function it_returns_vendor_from_shop_user_context(
        Security $security,
        ShopUserInterface $shopUser,
        VendorInterface $vendor
    ): void {
        $security->getUser()->willReturn($shopUser);

        $shopUser->getVendor()->willReturn($vendor);

        $this->provideCurrentVendor()
            ->shouldReturn($vendor);
    }
}
