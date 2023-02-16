<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\SectionResolver;

use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiUriBasedSectionResolver;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionCannotBeResolvedException;
use Sylius\Bundle\CoreBundle\SectionResolver\UriBasedSectionResolverInterface;

final class ShopVendorApiUriBasedSectionResolverSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('/api/v2/shop/account/vendor');
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ShopVendorApiUriBasedSectionResolver::class);
        $this->shouldHaveType(UriBasedSectionResolverInterface::class);
    }

    public function it_returns_shop_vendor_section_if_path_starts_with_api_v2_shop_vendor(): void
    {
        $this->getSection('/api/v2/shop/account/vendor')->shouldBeLike(new ShopVendorApiSection());
        $this->getSection('/api/v2/shop/account/vendor/something')->shouldBeLike(new ShopVendorApiSection());
    }

    public function it_throws_an_exception_if_path_does_not_start_with_api_v2_shop_vendor(): void
    {
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/shop']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/admin']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/en_US/api']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v1']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2/shop']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2/shop/vendors']);
        $this->shouldThrow(SectionCannotBeResolvedException::class)->during('getSection', ['/api/v2/admin']);
    }
}
