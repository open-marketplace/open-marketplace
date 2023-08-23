<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\Provider;

use BitBag\OpenMarketplace\Component\Core\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Component\Core\Api\Provider\PathPrefixProvider;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Provider\PathPrefixProviderInterface;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class PathPrefixProviderSpec extends ObjectBehavior
{
    public function let(
        PathPrefixProviderInterface $pathPrefixProvider,
        VendorContextInterface $vendorContext,
        SectionProviderInterface $sectionProvider
    ): void {
        $this->beConstructedWith(
            $pathPrefixProvider,
            $vendorContext,
            $sectionProvider,
            'api/v2/shop/account/vendor'
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(PathPrefixProvider::class);
        $this->shouldHaveType(PathPrefixProviderInterface::class);
    }

    public function it_return_vendor_prefix_if_vendor_path(): void
    {
        $this->getPathPrefix('api/v2/shop/account/vendor/something')->shouldReturn('vendor');
    }

    public function it_run_base_method_if_does_not_vendor_path(
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $pathPrefixProvider->getPathPrefix('api/v2/shop/account/something')->willReturn('base');

        $this->getPathPrefix('api/v2/shop/account/something')->shouldReturn('base');
    }

    public function it_return_shop_vendor_prefix_if_currently_legged_in_is_vendor_and_shop_vendor_section(
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $section
    ): void {
        $sectionProvider->getSection()->willReturn($section);
        $vendorContext->getVendor()->willReturn($vendor);

        $this->getCurrentPrefix()->shouldReturn('shop_vendor');
    }

    public function it_run_base_method_if_currently_legged_in_is_not_vendor(
        VendorContextInterface $vendorContext,
        PathPrefixProviderInterface $pathPrefixProvider,
    ): void {
        $vendorContext->getVendor()->willReturn(null);
        $pathPrefixProvider->getCurrentPrefix()->willReturn('base');

        $this->getCurrentPrefix()->shouldReturn('base');
    }

    public function it_run_base_method_if_currently_legged_in_is_vendor_and_shop_section(
        VendorContextInterface $vendorContext,
        PathPrefixProviderInterface $pathPrefixProvider,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $section
    ): void {
        $sectionProvider->getSection()->willReturn($section);
        $vendorContext->getVendor()->willReturn(null);
        $pathPrefixProvider->getCurrentPrefix()->willReturn('base');

        $this->getCurrentPrefix()->shouldReturn('base');
    }
}
