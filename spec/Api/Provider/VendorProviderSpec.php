<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Provider;

use BitBag\OpenMarketplace\Api\Provider\VendorProvider;
use BitBag\OpenMarketplace\Api\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

class VendorProviderSpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $vendorFactory
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
        FactoryInterface $vendorFactory,
        VendorInterface $vendor
    ): void {
        $shopUser->getVendor()->willReturn(null);

        $vendorFactory->createNew()->willReturn($vendor);
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
