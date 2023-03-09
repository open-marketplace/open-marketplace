<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Doctrine;

use ApiPlatform\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\Doctrine\VendorAwareExtension;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Entity\VendorAwareInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;

final class VendorAwareExtensionSpec extends ObjectBehavior
{
    public function let(
        VendorContextInterface $vendorContext,
        SectionProviderInterface $sectionProvider,
    ): void {
        $this->beConstructedWith($vendorContext, $sectionProvider);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorAwareExtension::class);
    }

    public function it_does_nothing_for_collection_when_current_resource_is_not_a_vendor_aware(
        SectionProviderInterface $sectionProvider,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->shouldNotBeCalled();
        $vendorContext->getVendor()->shouldNotBeCalled();
        $queryBuilder->getRootAliases()->shouldNotBeCalled();

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorInterface::class);
    }

    public function it_does_nothing_for_collection_when_section_in_not_shop_vendor_api(
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $vendorContext->getVendor()->shouldNotBeCalled();
        $queryBuilder->getRootAliases()->shouldNotBeCalled();

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorAwareInterface::class);
    }

    public function it_prevents_returning_any_records_for_collection_when_current_user_is_not_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn(null);
        $vendorContext->getVendor()->shouldBeCalled();
        $queryBuilder->andWhere('1=0')->shouldBeCalled();

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorAwareInterface::class);
    }

    public function it_filters_resources_by_current_vendor(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn($vendor);

        $vendorContext->getVendor()->shouldBeCalled();
        $queryBuilder->getRootAliases()->shouldBeCalled();

        $queryBuilder->getRootAliases()->willReturn(['o']);
        $queryBuilder->andWhere('o.vendor = :account_vendor')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter('account_vendor', $vendor)->shouldBeCalled()->willReturn($queryBuilder);

        $this->applyToCollection($queryBuilder, $queryNameGenerator, VendorAwareInterface::class);
    }

    public function it_does_nothing_for_item_when_current_resource_is_not_a_vendor_aware(
        SectionProviderInterface $sectionProvider,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->shouldNotBeCalled();
        $vendorContext->getVendor()->shouldNotBeCalled();
        $queryBuilder->getRootAliases()->shouldNotBeCalled();

        $this->applyToItem($queryBuilder, $queryNameGenerator, VendorInterface::class, ['id']);
    }

    public function it_does_nothing_for_item_when_section_is_not_shop_vendor_api(
        SectionProviderInterface $sectionProvider,
        ShopApiSection $shopApiSection,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopApiSection);
        $vendorContext->getVendor()->shouldNotBeCalled();
        $queryBuilder->getRootAliases()->shouldNotBeCalled();

        $this->applyToItem($queryBuilder, $queryNameGenerator, VendorAwareInterface::class, ['id']);
    }

    public function it_prevents_returning_record_when_current_user_is_not_vendor_context(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator
    ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn(null);
        $vendorContext->getVendor()->shouldBeCalled();
        $queryBuilder->andWhere('1=0')->shouldBeCalled();

        $this->applyToItem($queryBuilder, $queryNameGenerator, VendorAwareInterface::class, ['id']);
    }

    public function it_filters_resources_when_getting_item_by_current_vendor(
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $shopVendorApiSection,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        ): void {
        $sectionProvider->getSection()->willReturn($shopVendorApiSection);
        $vendorContext->getVendor()->willReturn($vendor);

        $vendorContext->getVendor()->shouldBeCalled();
        $queryBuilder->getRootAliases()->shouldBeCalled();

        $queryBuilder->getRootAliases()->willReturn(['o']);
        $queryBuilder->andWhere('o.vendor = :account_vendor')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter('account_vendor', $vendor)->shouldBeCalled()->willReturn($queryBuilder);

        $this->applyToItem($queryBuilder, $queryNameGenerator, VendorAwareInterface::class, ['id']);
    }
}
