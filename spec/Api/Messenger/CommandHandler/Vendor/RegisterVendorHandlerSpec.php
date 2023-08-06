<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\RegisterVendor;
use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\RegisterVendorInterface;
use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\RegisterVendorHandler;
use BitBag\OpenMarketplace\Api\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\Address;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUser;
use BitBag\OpenMarketplace\Component\Vendor\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;

final class RegisterVendorHandlerSpec extends ObjectBehavior
{
    public function let(
        VendorProviderInterface $vendorProvider,
        ObjectManager $manager
    ): void {
        $this->beConstructedWith($vendorProvider, $manager);
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(RegisterVendorHandler::class);
    }

    public function it_creates_a_vendor_for_current_shop_user(
        VendorProviderInterface $vendorProvider,
        ObjectManager $manager,
        VendorInterface $vendor,
        ShopUserInterface $shopUser,
        RegisterVendorInterface $command,
        Address $vendorAddress
    ): void {
        $command->getCompanyName()->willReturn('companyName');
        $command->getTaxIdentifier()->willReturn('taxIdentifier');
        $command->getPhoneNumber()->willReturn('phoneNumber');
        $command->getDescription()->willReturn('description');
        $command->getVendorAddress()->willReturn($vendorAddress);
        $command->getSlug()->willReturn('slug');
        $command->getShopUser()->willReturn($shopUser);

        $vendorProvider->provide($shopUser)->willReturn($vendor);

        $vendor->setCompanyName('companyName')->shouldBeCalled();
        $vendor->setTaxIdentifier('taxIdentifier')->shouldBeCalled();
        $vendor->setPhoneNumber('phoneNumber')->shouldBeCalled();
        $vendor->setDescription('description')->shouldBeCalled();
        $vendor->setVendorAddress($vendorAddress)->shouldBeCalled();
        $vendor->setSlug('slug')->shouldBeCalled();

        $manager->persist($vendor)->shouldBeCalled();

        $this($command)->shouldReturn($vendor);
    }

    public function it_throws_an_exception_if_shop_user_is_not_set(): void
    {
        $command = new RegisterVendor('companyName', 'taxIdentifier', 'phoneNumber', 'description', new Address());
        $command->setSlug('slug');

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }

    public function it_throws_an_exception_if_slug_is_not_set(): void
    {
        $command = new RegisterVendor('companyName', 'taxIdentifier', 'phoneNumber', 'description', new Address());
        $shopUser = new ShopUser();
        $command->setShopUser($shopUser);

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }
}
