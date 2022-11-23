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
use BitBag\OpenMarketplace\Api\DataProvider\VendorItemDataProvider;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Symfony\Component\HttpFoundation\Request;

class VendorItemDataProviderSpec extends ObjectBehavior
{
    public function let(
        UserContextInterface $userContext,
        VendorRepositoryInterface $vendorRepository,
    ): void {
        $this->beConstructedWith($userContext, $vendorRepository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorItemDataProvider::class);
        $this->shouldImplement(RestrictedDataProviderInterface::class);
        $this->shouldImplement(ItemDataProviderInterface::class);
    }

    public function it_supports_vendor_class(): void
    {
        $this->supports(Vendor::class)->shouldReturn(true);
    }

    public function it_provides_null_when_shop_user_is_not_in_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorRepositoryInterface $vendorRepository
    ): void
    {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn(null);

        $vendorRepository->find(1)->shouldNotBeCalled();

        $this
            ->getItem(
                VendorInterface::class,
                1,
                Request::METHOD_GET,
                [],
            )
            ->shouldReturn(null)
        ;
    }

    public function it_provides_null_when_logged_in_shop_user_try_to_get_another_vendor(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository
    ): void
    {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn($vendor);
        $vendor->getId()->willReturn(1);

        $vendorRepository->find(2)->shouldNotBeCalled();

        $this
            ->getItem(
                VendorInterface::class,
                2,
                Request::METHOD_GET,
                [],
            )
            ->shouldReturn(null)
        ;
    }

    public function it_provides_vendor_when_logged_in_shop_user_getting_vendor_from_his_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository
    ): void
    {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn($vendor);
        $vendor->getId()->willReturn(1);

        $vendorRepository->find('1')->willReturn($vendor);

        $this
            ->getItem(
                VendorInterface::class,
                1,
                Request::METHOD_GET,
                [],
            )
            ->shouldReturn($vendor)
        ;
    }
}
