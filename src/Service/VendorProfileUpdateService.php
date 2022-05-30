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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Doctrine\ORM\EntityManagerInterface;
use Namshi\JOSE\JWT;
use Sylius\Component\Mailer\Sender\Sender;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Security;

final class VendorProfileUpdateService implements VendorProfileUpdateServiceInterface
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
    
    public function createPendingVendorProfileUpdate(VendorInterface $vendorData): void
    {
        $currentVendor = $this->security->getUser()->getCustomer()->getVendor();
        $OldVendorPendingData = $this->entityManager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor'=> $currentVendor]);
        $pendingVendorUpdate = $OldVendorPendingData;
       
        if(null == $OldVendorPendingData)
            $pendingVendorUpdate = new VendorProfileUpdate();        
        
        $pendingVendorUpdate->setVendor($currentVendor);
        $pendingVendorUpdate->setCompanyName($vendorData->getCompanyName());
        $pendingVendorUpdate->setTaxIdentifier($vendorData->getTaxIdentifier());
        $pendingVendorUpdate->setPhoneNumber($vendorData->getPhoneNumber());
       
        $vendorAddressData = $vendorData->getVendorAddress();
//        dd($pendingVendorUpdate->getVendorAddress());
        $pendingVendorUpdate->setVendorAddress($vendorAddressData);
        $pendingVendorUpdate->getVendorAddress()->setCity($vendorAddressData->getCity());
        $pendingVendorUpdate->getVendorAddress()->setCountry($vendorAddressData->getCountry());
        $pendingVendorUpdate->getVendorAddress()->setPostalCode($vendorAddressData->getPostalCode());
        $pendingVendorUpdate->getVendorAddress()->setStreet($vendorAddressData->getStreet());
        $token = sha1(mt_rand(1, 90000) . 'SALT');
        $pendingVendorUpdate->setToken($token);
        
        $this->entityManager->persist($pendingVendorUpdate);
        $this->entityManager->flush();
        $this->sendEmail($this->security->getUser()->getUsername(), $token);
    }
    
    public function sendEmail(string $recipientAddress, string $token): void
    {        
        $this->sender->send('vendor_profile_update', [$recipientAddress], ['token'=>$token]);
    }
    
    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $vendor = $vendorData->getVendor();
       
        $vendor->setCompanyName($vendorData->getCompanyName());
        $vendor->setTaxIdentifier($vendorData->getTaxIdentifier());
        $vendor->setPhoneNumber($vendorData->getPhoneNumber());

        $vendorAddressData = $vendorData->getVendorAddress();
        $vendor->getVendorAddress()->setCity($vendorAddressData->getCity());
        $vendor->getVendorAddress()->setCountry($vendorAddressData->getCountry());
        $vendor->getVendorAddress()->setPostalCode($vendorAddressData->getPostalCode());
        $vendor->getVendorAddress()->setStreet($vendorAddressData->getStreet());
        $this->deletePendingData($vendorData);       
    }
    
    private function deletePendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $this->entityManager->remove($vendorData);
        $this->entityManager->flush();
    }
    
    private function setVendorFromData(Vendor $vendor, VendorProfileUpdateInterface $vendorData, string $token = null): void
    {
        
    }
}
