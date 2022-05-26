<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Service;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use Doctrine\ORM\EntityManagerInterface;
use Namshi\JOSE\JWT;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Security;

class VendorProfileUpdateService
{
    private Security $security;
    private EntityManagerInterface $entityManager;
    private SenderInterface $sender;

    public function __construct(Security $security, EntityManagerInterface $entityManager, SenderInterface $sender)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
        $this->sender = $sender;
    }
    
    public function createPendingVendorProfileUpdate(Vendor $vendorData)
    {
        $pendingVendorUpdate = new VendorProfileUpdate();
        $pendingVendorUpdate->setVendor($this->security->getUser()->getCustomer()->getVendor());
        $pendingVendorUpdate->setCompanyName($vendorData->getCompanyName());
        $pendingVendorUpdate->setTaxIdentifier($vendorData->getTaxIdentifier());
        $pendingVendorUpdate->setPhoneNumber($vendorData->getPhoneNumber());
        $pendingVendorUpdate->setVendorAddress($vendorData->getVendorAddress());
        $pendingVendorUpdate->setToken("sdadassa");
        $this->entityManager->persist($pendingVendorUpdate);
        $this->entityManager->flush();
        $this->sendEmail();
    }
    
    public function sendEmail()
    {
        $email = (new Email())
            ->from("asa@wr.ss")
            ->text("kjjk");
        $this->sender->send('movie_added_notification', ['team@website.com'], ['movie' => "movie", 'user' => "this->getUser()"]);
    }
}
