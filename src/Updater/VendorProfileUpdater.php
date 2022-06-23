<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Remover\ProfileUpdateRemoverInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class VendorProfileUpdater implements VendorProfileUpdaterInterface
{
    private EntityManagerInterface $entityManager;

    private SenderInterface $sender;

    private ProfileUpdateRemoverInterface $remover;

    private VendorProfileUpdateFactoryInterface $profileUpdateFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        ProfileUpdateRemoverInterface $remover,
        VendorProfileUpdateFactoryInterface $profileUpdateFactory
    ) {
        $this->entityManager = $entityManager;
        $this->sender = $sender;
        $this->remover = $remover;
        $this->profileUpdateFactory = $profileUpdateFactory;
    }

    public function createPendingVendorProfileUpdate(VendorProfileInterface $vendorData, VendorInterface $currentVendor): void
    {
        $pendingVendorUpdate = $this->profileUpdateFactory->createWithGeneratedTokenAndVendor($currentVendor);
        $token = $pendingVendorUpdate->getToken();

        $this->setVendorFromData($pendingVendorUpdate, $vendorData);

        $shopUser = $currentVendor->getShopUser();
        $email = $shopUser->getUsername();

        $this->sender->send('vendor_profile_update', [$email], ['token' => $token]);
    }

    public function setVendorFromData(VendorProfileInterface $vendor, VendorProfileInterface $data): void
    {
        $vendor->setCompanyName($data->getCompanyName());
        $vendor->setTaxIdentifier($data->getTaxIdentifier());
        $vendor->setPhoneNumber($data->getPhoneNumber());
        $vendor->setDescription($data->getDescription());
        $newVendorAddress = $data->getVendorAddress();

        if (null === $newVendorAddress) {
            return;
        }
        if (null !== $vendor->getVendorAddress()) {
            $vendor->getVendorAddress()->setCity($newVendorAddress->getCity());
            $vendor->getVendorAddress()->setCountry($newVendorAddress->getCountry());
            $vendor->getVendorAddress()->setPostalCode($newVendorAddress->getPostalCode());
            $vendor->getVendorAddress()->setStreet($newVendorAddress->getStreet());
        }
        $this->entityManager->persist($vendor);
        $this->entityManager->flush();
    }

    public function updateVendorFromPendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $vendor = $vendorData->getVendor();

        $this->setVendorFromData($vendor, $vendorData);
        $this->remover->removePendingUpdate($vendorData);
    }
}
