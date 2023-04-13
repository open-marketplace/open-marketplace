<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Doctrine\QueryExtension\Vendor;

use ApiPlatform\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\Doctrine\QueryExtension\Vendor\VendorContextExtension;
use BitBag\OpenMarketplace\Api\Doctrine\QueryExtension\Vendor\VendorContextStrategy\FilterVendorStrategy;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class VendorContextExtensionSpec extends ObjectBehavior
{
    public function let(
        FilterVendorStrategy $filterVendorStrategy,
        VendorContextInterface $vendorContext,
        SectionProviderInterface $sectionProvider,
        ): void {
        $this->beConstructedWith([$filterVendorStrategy], $vendorContext, $sectionProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorContextExtension::class);
        $this->shouldHaveType(QueryCollectionExtensionInterface::class);
    }

    public function it_does_nothing_for_collection_when_strategy_does_not_support_class(
        FilterVendorStrategy $filterVendorStrategy,
        SectionProviderInterface $sectionProvider,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $filterVendorStrategy->supports(VendorInterface::class)->willReturn(false);

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorInterface::class);

        $sectionProvider->getSection()->shouldNotHaveBeenCalled();
        $vendorContext->getVendor()->shouldNotHaveBeenCalled();
    }

    public function it_does_nothing_for_collection_when_section_in_not_shop_vendor_api(
        FilterVendorStrategy $filterVendorStrategy,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $filterVendorStrategy->supports(VendorInterface::class)->willReturn(true);
        $sectionProvider->getSection()->willReturn($shopApiSection);

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorInterface::class);

        $vendorContext->getVendor()->shouldNotHaveBeenCalled();
    }

    public function it_prevents_returning_any_records_for_collection_when_current_user_is_not_vendor_context(
        FilterVendorStrategy $filterVendorStrategy,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $filterVendorStrategy->supports(VendorInterface::class)->willReturn(true);
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn(null);

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorInterface::class);

        $queryBuilder->andWhere('1=0')->shouldHaveBeenCalled();
    }

    public function it_filters_resources_by_current_vendor(
        FilterVendorStrategy $filterVendorStrategy,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $filterVendorStrategy->supports(VendorInterface::class)->willReturn(true);
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn($vendor);

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorInterface::class);

        $filterVendorStrategy->filterByVendor($queryBuilder, $vendor)->shouldHaveBeenCalled();
    }
}
