<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use BitBag\OpenMarketplace\Api\Context\VendorContextInterface;
use BitBag\OpenMarketplace\Api\DataProvider\CustomerItemDataProvider;
use BitBag\OpenMarketplace\Api\SectionResolver\ShopVendorApiSection;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\CustomerRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\SectionResolver\ShopApiSection;
use Sylius\Bundle\CoreBundle\SectionResolver\SectionProviderInterface;
use Sylius\Component\Core\Model\CustomerInterface;

final class CustomerItemDataProviderSpec extends ObjectBehavior
{
    public function let(
        ItemDataProviderInterface $baseCustomerItemDataProvider,
        CustomerRepositoryInterface $customerRepository,
        SectionProviderInterface $sectionProvider,
        VendorContextInterface $vendorContext,
        ): void {
        $this->beConstructedWith(
            $baseCustomerItemDataProvider,
            $customerRepository,
            $sectionProvider,
            $vendorContext,
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(CustomerItemDataProvider::class);
        $this->shouldHaveType(ItemDataProviderInterface::class);
        $this->shouldHaveType(RestrictedDataProviderInterface::class);
    }

    public function it_run_base_if_logged_in_is_not_vendor(
        ItemDataProviderInterface $baseCustomerItemDataProvider,
        CustomerInterface $customer,
        VendorContextInterface $vendorContext,
        ): void {
        $vendorContext->getVendor()->willReturn(null);
        $baseCustomerItemDataProvider->getItem('test', 1, 'get', [])->willReturn($customer);

        $this->getItem('test', 1, 'get')->shouldReturn($customer);
    }

    public function it_run_base_if_logged_in_is_vendor_and_shop_section(
        ItemDataProviderInterface $baseCustomerItemDataProvider,
        CustomerInterface $customer,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        SectionProviderInterface $sectionProvider,
        ShopApiSection $section,
        ): void {
        $vendorContext->getVendor()->willReturn($vendor);
        $sectionProvider->getSection()->willReturn($section);
        $baseCustomerItemDataProvider->getItem('test', 1, 'get', [])->willReturn($customer);

        $this->getItem('test', 1, 'get')->shouldReturn($customer);
    }

    public function it_return_customers_vendor_if_logged_in_is_vendor_and_vendor_shop_section(
        ItemDataProviderInterface $baseCustomerItemDataProvider,
        CustomerInterface $customer,
        CustomerRepositoryInterface $customerRepository,
        VendorContextInterface $vendorContext,
        VendorInterface $vendor,
        SectionProviderInterface $sectionProvider,
        ShopVendorApiSection $section,
        ): void {
        $vendorContext->getVendor()->willReturn($vendor);
        $sectionProvider->getSection()->willReturn($section);
        $customerRepository->findCustomerForVendor($vendor, '1')->willReturn($customer);

        $this->getItem('test', 1, 'get')->shouldReturn($customer);

        $baseCustomerItemDataProvider->getItem('test', 1, 'get', [])->shouldNotHaveBeenCalled();
    }
}
