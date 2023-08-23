<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Component\Core\Vendor\Twig\Extension;

use BitBag\OpenMarketplace\Component\Core\Vendor\Twig\Extension\VendorClientExtension;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Repository\CustomerRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\CustomerInterface;
use Twig\Extension\AbstractExtension;

final class VendorClientExtensionSpec extends ObjectBehavior
{
    public function let(CustomerRepositoryInterface $customerRepository)
    {
        $this->beConstructedWith($customerRepository);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(VendorClientExtension::class);
        $this->shouldHaveType(AbstractExtension::class);
    }

    public function it_is_false_if_vendor_does_not_have_client(
        CustomerRepositoryInterface $customerRepository,
        VendorInterface $vendor,
        CustomerInterface $customer
    ): void {
        $id = 1;
        $customer->getId()->willReturn($id);
        $customerRepository->findCustomerForVendor($vendor, '1')->willReturn(null);

        $this->isVendorClient($vendor, $customer)->shouldReturn(false);
    }

    public function it_is_true_if_vendor_have_client(
        CustomerRepositoryInterface $customerRepository,
        VendorInterface $vendor,
        CustomerInterface $customer
    ): void {
        $id = 1;
        $customer->getId()->willReturn($id);
        $customerRepository->findCustomerForVendor($vendor, '1')->willReturn($customer);

        $this->isVendorClient($vendor, $customer)->shouldReturn(true);
    }
}
