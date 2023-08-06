<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Api\SectionResolver;

use BitBag\OpenMarketplace\Component\Core\Api\Factory\ShopVendorApiSectionFactoryInterface;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Core\Api\SectionResolver\ShopVendorApiUriBasedSectionResolver;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionCannotBeResolvedException;
use Sylius\Bundle\CoreBundle\SectionResolver\UriBasedSectionResolverInterface;

final class ShopVendorApiUriBasedSectionResolverSpec extends ObjectBehavior
{
    public function let(ShopVendorApiSectionFactoryInterface $shopVendorApiSectionFactory)
    {
        $this->beConstructedWith('/api/v2/shop/account/vendor', $shopVendorApiSectionFactory);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShopVendorApiUriBasedSectionResolver::class);
        $this->shouldHaveType(UriBasedSectionResolverInterface::class);
    }

    public function it_returns_shop_vendor_section_if_path_starts_with_api_v2_shop_vendor(
        ShopVendorApiSectionFactoryInterface $shopVendorApiSectionFactory,
        ShopVendorApiSection $shopVendorApiSection,
    ): void {
        $shopVendorApiSectionFactory->createNew()->willReturn($shopVendorApiSection);

        $this->getSection('/api/v2/shop/account/vendor')->shouldReturn($shopVendorApiSection);
    }

    public function it_returns_shop_vendor_section_if_path_starts_with_api_v2_shop_vendor_something(
        ShopVendorApiSectionFactoryInterface $shopVendorApiSectionFactory,
        ShopVendorApiSection $shopVendorApiSection,
    ): void {
        $shopVendorApiSectionFactory->createNew()->willReturn($shopVendorApiSection);

        $this->getSection('/api/v2/shop/account/vendor/something')->shouldReturn($shopVendorApiSection);
    }

    public function it_throws_an_exception_if_path_starts_with_shop(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/shop']);
    }

    public function it_throws_an_exception_if_path_starts_with_admin(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/admin']);
    }

    public function it_throws_an_exception_if_path_starts_with_api(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/en_US/api']);
    }

    public function it_throws_an_exception_if_path_starts_with_api_v1(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v1']);
    }

    public function it_throws_an_exception_if_path_starts_with_api_v2(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v1']);
    }

    public function it_throws_an_exception_if_path_starts_with_api_v2_shop(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2/shop']);
    }

    public function it_throws_an_exception_if_path_starts_with_api_v2_admin(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2/admin']);
    }

    public function it_throws_an_exception_if_path_starts_with_api_v2_shop_vendors(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2/shop/vendors']);
    }
}
