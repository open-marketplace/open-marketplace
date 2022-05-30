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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorDataInterface;
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
        $token = md5(mt_rand(1, 90000) . 'SALT');
        $pendingVendorUpdate->setToken($token);
        $this->setVendorFromData($pendingVendorUpdate, $vendorData);            
        $this->sendEmail($this->security->getUser()->getUsername(), $token);
    }
    
    private function setVendorFromData(VendorDataInterface $vendor, VendorDataInterface $data): void
    {        
        $vendor->setCompanyName($data->getCompanyName());
        $vendor->setTaxIdentifier($data->getTaxIdentifier());
        $vendor->setPhoneNumber($data->getPhoneNumber());
        $vendorAddress = $data->getVendorAddress();
        $vendor->setVendorAddress($vendorAddress);
        $vendor->getVendorAddress()->setCity($vendorAddress->getCity());
        $vendor->getVendorAddress()->setCountry($vendorAddress->getCountry());
        $vendor->getVendorAddress()->setPostalCode($vendorAddress->getPostalCode());
        $vendor->getVendorAddress()->setStreet($vendorAddress->getStreet());        
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }
    
    public function sendEmail(string $recipientAddress, string $token): void
    {        
        $this->sender->send('vendor_profile_update', [$recipientAddress], ['token'=>$token]);
    }
    
    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $vendor = $vendorData->getVendor();       
        $this->setVendorFromData($vendor, $vendorData);
        $this->deletePendingData($vendorData);       
    }
    
    private function deletePendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $this->entityManager->remove($vendorData);
        $this->entityManager->flush();
    }
}
