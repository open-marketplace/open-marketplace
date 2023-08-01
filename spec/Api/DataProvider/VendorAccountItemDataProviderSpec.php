<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\DataProvider\VendorAccountItemDataProvider;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Vendor;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Ramsey\Uuid\UuidInterface;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class VendorAccountItemDataProviderSpec extends ObjectBehavior
{
    public function let(
        VendorContextInterface $vendorContext,
        VendorRepositoryInterface $vendorRepository,
        SectionProviderInterface $sectionProvider,
        ): void {
        $this->beConstructedWith($vendorContext, $vendorRepository, $sectionProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorAccountItemDataProvider::class);
        $this->shouldImplement(RestrictedDataProviderInterface::class);
        $this->shouldImplement(ItemDataProviderInterface::class);
    }

    public function it_supports_vendor_class(): void
    {
        $this->supports(Vendor::class)->shouldReturn(true);
    }

    public function it_provides_vendor_for_shop_api_section_and_without_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $vendorContext->getVendor()->willReturn(null);

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this->getItem(VendorInterface::class, $uuid)->shouldReturn($vendor);
    }

    public function it_provides_vendor_for_shop_api_section_and_user_with_other_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $vendorContext->getVendor()->willReturn($vendor);
        $vendor->getUuid()->shouldNotBeCalled();
        $uuid->equals($uuid)->shouldNotBeCalled();

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this->getItem(VendorInterface::class, $uuid)->shouldReturn($vendor);
    }

    public function it_provides_null_for_shop_vendor_api_section_and_shop_user_without_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn(null);

        $vendorRepository->findOneBy(['uuid' => $uuid])->shouldNotBeCalled();

        $this->getItem(VendorInterface::class, $uuid)->shouldReturn(null);
    }

    public function it_provides_null_for_shop_vendor_api_section_and_user_with_other_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn($vendor);
        $vendor->getUuid()->willReturn($uuid);
        $uuid->equals($uuid)->willReturn(false);

        $vendorRepository->findOneBy(['uuid' => $uuid])->shouldNotBeCalled();

        $this->getItem(VendorInterface::class, $uuid)->shouldReturn(null);
    }

    public function it_provides_vendor_for_shop_vendor_api_section_and_user_with_same_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn($vendor);
        $vendor->getUuid()->willReturn($uuid);
        $uuid->equals($uuid)->willReturn(true);

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this->getItem(VendorInterface::class, $uuid)->shouldReturn($vendor);
    }
}
