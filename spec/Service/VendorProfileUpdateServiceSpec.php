<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Service;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUser;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdateRemover\RemoverInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdater\VendorProfileUpdater;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class VendorProfileUpdateServiceSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        RemoverInterface $remover
    ): void {
        $this->beConstructedWith($entityManager, $sender, $remover);
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
        VendorInterface $vendor,
        VendorProfileInterface $vendorData,
        ShopUser $user
    ): void {
        $vendor->getUser()->willReturn($user);
        $user->getUsername()->willReturn('test@mail.at');
        $this->createPendingVendorProfileUpdate($vendorData, $vendor);
        $sender->send(Argument::type('string'), Argument::any(), Argument::any())->shouldHaveBeenCalled(1);
    }
}
