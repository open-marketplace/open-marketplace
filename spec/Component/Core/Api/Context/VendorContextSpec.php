<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Context;

use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContext;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;

final class VendorContextSpec extends ObjectBehavior
{
    public function let(
        UserContextInterface $userContext,
    ): void {
        $this->beConstructedWith($userContext);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorContext::class);
    }

    public function it_returns_vendor_for_current_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $shopUser,
        VendorInterface $vendor
    ): void {
        $shopUser->getVendor()->willReturn($vendor);
        $userContext->getUser()->willReturn($shopUser);

        $this->getVendor()->shouldReturn($vendor);
    }

    public function it_returns_null_when_there_is_not_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $shopUser
    ): void {
        $shopUser->getVendor()->willReturn(null);
        $userContext->getUser()->willReturn($shopUser);

        $this->getVendor()->shouldReturn(null);
    }

    public function it_returns_null_when_there_is_not_shop_user_context(
        UserContextInterface $userContext
    ): void {
        $userContext->getUser()->willReturn(null);

        $this->getVendor()->shouldReturn(null);
    }
}
