<?php

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Service;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\RemoverInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Service\VendorProfileUpdateService;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Sylius\Component\User\Model\User;

class VendorProfileUpdateServiceSpec extends ObjectBehavior
{
    function let(EntityManagerInterface $entityManager,
                 SenderInterface $sender,
                 RemoverInterface $remover)
    {
        $this->beConstructedWith($entityManager, $sender, $remover);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(VendorProfileUpdateService::class);
    }    
    function it_gets_correct_data(
        EntityManagerInterface $entityManager,
        VendorInterface $vendor,
        VendorProfileInterface $vendorData      
    )
    {        
        $vendor->getCompanyName()->shouldBeCalled(1);
        $vendor->getTaxIdentifier()->shouldBeCalled(1);
        $vendor->getPhoneNumber()->shouldBeCalled(1);
        $vendor->getDescription()->shouldBeCalled();
        $vendor->getVendorAddress()->shouldBeCalled(4);

        $this->setVendorFromData($vendorData, $vendor);
        $entityManager->flush()->shouldHaveBeenCalled(1);
    }
    function it_sends_email_after_crate_pending_data(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        RemoverInterface $remover,
        VendorInterface $vendor,
        VendorProfileInterface $vendorData,
        Customer $customer,
        User $user
    )
    {                
        $vendor->getCustomer()->willReturn($customer);
        $customer->getUser()->willReturn($user);
        $user->getUsername()->willReturn("test@mail.at");
        $this->createPendingVendorProfileUpdate($vendorData, $vendor);
        $sender->send(Argument::any(),Argument::any(), Argument::any())->shouldHaveBeenCalled(1);
    }
}
