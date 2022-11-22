<?php

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\RegisterVendor;
use BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor\RegisterVendorHandler;
use BitBag\OpenMarketplace\Api\Provider\VendorProviderInterface;
use BitBag\OpenMarketplace\Entity\ShopUser;
use BitBag\OpenMarketplace\Entity\VendorAddress;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Persistence\ObjectManager;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class RegisterVendorHandlerSpec extends ObjectBehavior
{
    public function let(
        VendorProviderInterface $vendorProvider,
        ObjectManager $manager
    ): void {
        $this->beConstructedWith($vendorProvider, $manager);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RegisterVendorHandler::class);
        $this->shouldImplement(MessageHandlerInterface::class);
    }

    public function it_creates_a_vendor_for_current_shop_user(
        VendorProviderInterface $vendorProvider,
        ObjectManager $manager,
        VendorInterface $vendor
    ): void {
        $command = new RegisterVendor('companyName', 'taxIdentifier', 'phoneNumber', 'description', new VendorAddress());
        $command->setSlug('slug');
        $shopUser = new ShopUser();
        $command->setShopUser($shopUser);

        $vendorProvider->provide($shopUser)->willReturn($vendor);

        $vendor->setCompanyName($command->companyName)->shouldBeCalled();
        $vendor->setTaxIdentifier($command->taxIdentifier)->shouldBeCalled();
        $vendor->setPhoneNumber($command->phoneNumber)->shouldBeCalled();
        $vendor->setDescription($command->description)->shouldBeCalled();
        $vendor->setVendorAddress($command->vendorAddress)->shouldBeCalled();
        $vendor->setSlug($command->slug)->shouldBeCalled();

        $manager->persist($vendor)->shouldBeCalled();

        $this($command)->shouldReturn($vendor);
    }

    public function it_throws_an_exception_if_shop_user_is_not_set(): void
    {
        $command = new RegisterVendor('companyName', 'taxIdentifier', 'phoneNumber', 'description', new VendorAddress());
        $command->setSlug('slug');

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }

    public function it_throws_an_exception_if_slug_is_not_set(): void
    {
        $command = new RegisterVendor('companyName', 'taxIdentifier', 'phoneNumber', 'description', new VendorAddress());
        $shopUser = new ShopUser();
        $command->setShopUser($shopUser);

        $this
            ->shouldThrow(\DomainException::class)
            ->during('__invoke', [$command])
        ;
    }
}
