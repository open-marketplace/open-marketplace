<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUser;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdater\VendorProfileUpdater;
use BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdater\VendorProfileUpdaterInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdateRemover\RemoverInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Mailer\Sender\SenderInterface;

class VendorProfileUpdaterSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        RemoverInterface $remover,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory
    ): void {
        $this->beConstructedWith($entityManager, $sender, $remover, $vendorProfileFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(VendorProfileUpdater::class);
    }

    public function it_gets_correct_data(
        EntityManagerInterface $entityManager,
        VendorInterface $vendor,
        VendorProfileInterface $vendorData
    ): void {
        $vendor->getCompanyName()->shouldBeCalled(1);
        $vendor->getTaxIdentifier()->shouldBeCalled(1);
        $vendor->getPhoneNumber()->shouldBeCalled(1);
        $vendor->getVendorAddress()->shouldBeCalled(4);

        $this->setVendorFromData($vendorData, $vendor);
        $entityManager->flush()->shouldHaveBeenCalled(1);
    }

    public function it_sends_email_after_create_pending_data(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        RemoverInterface $remover,
        VendorProfileUpdateFactoryInterface $vendorProfileFactory,
        VendorInterface $vendor,
        VendorProfileInterface $vendorData,
        VendorProfileUpdateInterface $vendorDataRaw,
        ShopUser $user
    ): void {

        $vendorProfileFactory->createWithTokenAndVendor(Argument::any(), $vendor)->willReturn($vendorDataRaw);
        $vendor->getShopUser()->willReturn($user);
        $user->getUsername()->willReturn('test@mail.at');
        $this->createPendingVendorProfileUpdate($vendorData, $vendor);
        $sender->send('vendor_profile_update', ['test@mail.at'], Argument::any())->shouldHaveBeenCalled(1);
    }
}
