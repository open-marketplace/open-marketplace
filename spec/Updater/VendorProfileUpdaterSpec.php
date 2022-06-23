<?php

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUser;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorAddressInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Remover\ProfileUpdateRemoverInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\VendorProfileUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Mailer\Sender\SenderInterface;

class VendorProfileUpdaterSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        ProfileUpdateRemoverInterface $remover,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory
    ): void {
        $this->beConstructedWith($entityManager, $sender, $remover, $vendorProfileFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorProfileUpdaterInterface::class);
    }

    public function it_calls_entity_manager(
        EntityManagerInterface $entityManager,
        VendorInterface $vendor,
        VendorProfileInterface $vendorData,
        VendorAddressInterface $vendorAddress
    ): void {
        $vendorData->getCompanyName()->willReturn("CompanyName");
        $vendorData->getTaxIdentifier()->willReturn("CompanyName");
        $vendorData->getPhoneNumber()->willReturn("CompanyName");
        $vendorData->getVendorAddress()->willReturn($vendorAddress);

        $this->setVendorFromData($vendor, $vendorData);

        $entityManager->flush()->shouldHaveBeenCalled(1);
        $entityManager->persist($vendor)->shouldHaveBeenCalledTimes(1);
    }

    public function it_sends_email_after_creating_pending_data(
        SenderInterface $sender,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory,
        VendorInterface $vendor,
        VendorProfileInterface $vendorData,
        VendorProfileUpdateInterface $newPendingUpdate,
        ShopUser $user,
        VendorAddressInterface $vendorAddressUpdate
    ): void {
        $vendorProfileFactory->createWithGeneratedTokenAndVendor($vendor)->willReturn($newPendingUpdate);
        $newPendingUpdate->getToken()->willReturn('testing-token');
        $vendorData->getCompanyName()->willReturn('testcompany');
        $vendorData->getTaxIdentifier()->willReturn('testTaxID');
        $vendorData->getPhoneNumber()->willReturn('testNumber');
        $vendorData->getVendorAddress()->willReturn($vendorAddressUpdate);

        $newPendingUpdate->getVendorAddress()->shouldBeCalled();
        $newPendingUpdate->setCompanyName('testcompany')->shouldBeCalled();
        $newPendingUpdate->setTaxIdentifier('testTaxID')->shouldBeCalled();
        $newPendingUpdate->setPhoneNumber('testNumber')->shouldBeCalled();
        $vendor->getShopUser()->willReturn($user);
        $user->getUsername()->willReturn('test@mail.at');
        $this->createPendingVendorProfileUpdate($vendorData, $vendor);
        $sender->send('vendor_profile_update', ['test@mail.at'], ['token' => 'testing-token'])->shouldHaveBeenCalledTimes(1);
    }
}
