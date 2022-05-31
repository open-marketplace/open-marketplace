<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Service;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorDataInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdate;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Symfony\Component\Security\Core\Security;

final class VendorProfileUpdateService implements VendorProfileUpdateServiceInterface
{
    private Security $security;

    private EntityManagerInterface $entityManager;

    private SenderInterface $sender;
    
    private VendorProvider $vendorProvider;

    public function __construct(
        Security $security,
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        VendorProvider $vendorProvider
    ) {
        $this->security = $security;
        $this->entityManager = $entityManager;
        $this->sender = $sender;
        $this->vendorProvider = $vendorProvider;
    }

    public function createPendingVendorProfileUpdate(VendorInterface $vendorData): void
    {
        $currentVendor = $this->vendorProvider->getLoggedVendor();
        
        $OldVendorPendingData = $this->entityManager->getRepository(VendorProfileUpdate::class)->findOneBy(['vendor' => $currentVendor]);
        $pendingVendorUpdate = $OldVendorPendingData;
        if (null == $pendingVendorUpdate) {
            $pendingVendorUpdate = new VendorProfileUpdate();
        }
        $pendingVendorUpdate->setVendor($currentVendor);
        $token = md5(mt_rand(1, 90000) . 'SALT');
        $pendingVendorUpdate->setToken($token);
        $this->setVendorFromData($pendingVendorUpdate, $vendorData);
        $user = $currentVendor->getCustomer()->getUser();
        if (null == $user) {
            return;
        }
        $this->sendEmail($user->getUsername(), $token);
    }

    private function setVendorFromData(VendorDataInterface $vendor, VendorDataInterface $data): void
    {
        $vendor->setCompanyName($data->getCompanyName());
        $vendor->setTaxIdentifier($data->getTaxIdentifier());
        $vendor->setPhoneNumber($data->getPhoneNumber());

        $newVendorAddress = $data->getVendorAddress();
        if (null == $newVendorAddress) {
            return;
        }
        $vendor->setVendorAddress($newVendorAddress);
        $oldVendorAddress = $vendor->getVendorAddress();
        if (null == $oldVendorAddress) {
            return;
        }
        $oldVendorAddress->setCity($newVendorAddress->getCity());
        $oldVendorAddress->setCountry($newVendorAddress->getCountry());
        $oldVendorAddress->setPostalCode($newVendorAddress->getPostalCode());
        $oldVendorAddress->setStreet($newVendorAddress->getStreet());
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    public function sendEmail(string $recipientAddress, string $token): void
    {
        $this->sender->send('vendor_profile_update', [$recipientAddress], ['token' => $token]);
    }

    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $vendor = $vendorData->getVendor();
        if (null == $vendor) {
            return;
        }
        $this->setVendorFromData($vendor, $vendorData);
        $this->deletePendingData($vendorData);
    }    

    private function deletePendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $this->entityManager->remove($vendorData);
        $this->entityManager->flush();
    }
}
