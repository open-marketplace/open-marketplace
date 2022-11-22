<?php

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Provider;

use BitBag\OpenMarketplace\Api\Provider\VendorProvider;
use BitBag\OpenMarketplace\Api\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorFactoryInterface;
use PhpSpec\ObjectBehavior;

class VendorProviderSpec extends ObjectBehavior
{
    public function let(
        VendorFactoryInterface $vendorFactory
    ): void {
        $this->beConstructedWith($vendorFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorProvider::class);
        $this->shouldImplement(VendorProviderInterface::class);
    }

    public function it_create_new_vendor_when_shop_user_has_no_vendor_context(
        ShopUserInterface $shopUser,
        VendorFactoryInterface $vendorFactory,
        VendorInterface $vendor
    ): void {
        $shopUser->getVendor()->willReturn(null);

        $vendorFactory->createVendor()->willReturn($vendor);
        $vendor->setShopUser($shopUser)->shouldBeCalled();

        $this->provide($shopUser)
            ->shouldReturn($vendor);
    }

    public function it_returns_vendor_from_shop_user_context(
        ShopUserInterface $shopUser,
        VendorInterface $vendor
    ): void {
        $shopUser->getVendor()->willReturn($vendor);
        $vendor->setShopUser($shopUser)->shouldNotBeCalled();

        $this->provide($shopUser)
            ->shouldReturn($vendor);
    }
}
