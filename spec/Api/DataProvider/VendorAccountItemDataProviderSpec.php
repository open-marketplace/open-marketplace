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
use BitBag\OpenMarketplace\Api\DataProvider\VendorAccountItemDataProvider;
use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Entity\Vendor;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Repository\VendorRepositoryInterface;
use PhpSpec\ObjectBehavior;
use Ramsey\Uuid\UuidInterface;
use Sylius\Bundle\ApiBundle\Context\UserContextInterface;
use Symfony\Component\HttpFoundation\Request;

final class VendorAccountItemDataProviderSpec extends ObjectBehavior
{
    public function let(
        UserContextInterface $userContext,
        VendorRepositoryInterface $vendorRepository,
    ): void {
        $this->beConstructedWith($userContext, $vendorRepository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorAccountItemDataProvider::class);
        $this->shouldImplement(RestrictedDataProviderInterface::class);
        $this->shouldImplement(ItemDataProviderInterface::class);
    }

    public function it_supports_vendor_class(): void
    {
        $this->supports(Vendor::class)->shouldReturn(true);
    }

    public function it_provides_vendor_for_not_account_operation_and_without_user_context(
        UserContextInterface $userContext,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $userContext->getUser()->willReturn(null);

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this
            ->getItem(
                VendorInterface::class,
                $uuid,
                Request::METHOD_GET,
                [],
            )
            ->shouldReturn($vendor)
        ;
    }

    public function it_provides_vendor_for_not_account_operation_and_shop_user_without_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn(null);

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this
            ->getItem(
                VendorInterface::class,
                $uuid,
                Request::METHOD_GET,
                [],
            )
            ->shouldReturn($vendor)
        ;
    }

    public function it_provides_vendor_for_not_account_operation_and_user_with_other_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn($vendor);
        $vendor->getUuid()->willReturn($uuid);

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this
            ->getItem(
                VendorInterface::class,
                $uuid,
                Request::METHOD_GET,
                [],
            )
            ->shouldReturn($vendor);
    }

    public function it_provides_null_for_account_operation_and_shop_user_without_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn(null);

        $vendorRepository->findOneBy(['uuid' => $uuid])->shouldNotBeCalled();

        $this
            ->getItem(
                VendorInterface::class,
                $uuid,
                'shop_account_get',
                [],
            )
            ->shouldReturn(null)
        ;
    }

    public function it_provides_null_for_account_operation_and_user_with_other_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn($vendor);
        $vendor->getUuid()->willReturn($uuid);
        $uuid->equals($uuid)->willReturn(false);

        $vendorRepository->findOneBy(['uuid' => $uuid])->shouldNotBeCalled();

        $this
            ->getItem(
                VendorInterface::class,
                $uuid,
                'shop_account_get',
                [],
            )
            ->shouldReturn(null)
        ;
    }

    public function it_provides_vendor_for_user_with_same_vendor_context(
        UserContextInterface $userContext,
        ShopUserInterface $user,
        VendorInterface $vendor,
        VendorRepositoryInterface $vendorRepository,
        UuidInterface $uuid
    ): void {
        $userContext->getUser()->willReturn($user);
        $user->getVendor()->willReturn($vendor);
        $vendor->getUuid()->willReturn($uuid);
        $uuid->equals($uuid)->willReturn(true);

        $vendorRepository->findOneBy(['uuid' => $uuid])->willReturn($vendor);

        $this
            ->getItem(
                VendorInterface::class,
                $uuid,
                'shop_account_get',
                [],
            )
            ->shouldReturn($vendor)
        ;
    }
}
