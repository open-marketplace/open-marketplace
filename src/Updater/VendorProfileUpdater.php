<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Updater;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImage;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorImageFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\VendorProfileUpdateImageFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Remover\ProfileUpdateRemoverInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Uploader\ImageUploader;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class VendorProfileUpdater implements VendorProfileUpdaterInterface
{
    private EntityManagerInterface $entityManager;

    private SenderInterface $sender;

    private ProfileUpdateRemoverInterface $remover;

    private VendorProfileUpdateFactoryInterface $profileUpdateFactory;

    private VendorProfileUpdateImageFactoryInterface $imageFactory;

    private ImageUploaderInterface $imageUploader;

    public function __construct(
        EntityManagerInterface $entityManager,
        SenderInterface $sender,
        ProfileUpdateRemoverInterface $remover,
        VendorProfileUpdateFactoryInterface $profileUpdateFactory,
        VendorProfileUpdateImageFactoryInterface $imageFactory,
        ImageUploader $imageUploader
    ) {
        $this->entityManager = $entityManager;
        $this->sender = $sender;
        $this->remover = $remover;
        $this->profileUpdateFactory = $profileUpdateFactory;
        $this->imageFactory = $imageFactory;
        $this->imageUploader = $imageUploader;
    }

    public function createPendingVendorProfileUpdate(
        VendorProfileInterface $vendorData,
        VendorInterface $currentVendor,
        ?ImageInterface $image
    ): void {
        $pendingVendorUpdate = $this->profileUpdateFactory->createWithGeneratedTokenAndVendor($currentVendor);

        if($image){
            $imageEntity = $this->imageFactory->createWithFileAndOwner($image, $pendingVendorUpdate);

            $this->imageUploader->upload($imageEntity);
            $pendingVendorUpdate->setImage($imageEntity);
        }

        $token = $pendingVendorUpdate->getToken();

        $this->setVendorFromData($pendingVendorUpdate, $vendorData);

        $shopUser = $currentVendor->getShopUser();
        $email = $shopUser->getUsername();

        $this->sender->send('vendor_profile_update', [$email], ['token' => $token]);
    }

    public function setVendorFromData(
        VendorProfileInterface $vendor,
        VendorProfileInterface $data
    ): void {
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
        $this->addOrReplaceVendorImage($vendorData, $vendor);

        $this->remover->removePendingUpdate($vendorData);
    }

    private function addOrReplaceVendorImage(VendorProfileUpdateInterface $vendorData, VendorInterface $vendor): void
    {
        if($vendorData->getImage()) {
            $oldImage = $vendor->getImage();
            if(null !== $oldImage) {
                /** @var string $path */
                $path = $oldImage->getPath();
                $this->imageUploader->remove($path);
                $this->entityManager->remove($oldImage);
                $this->entityManager->flush();
            }

            $image = $vendorData->getImage();

            if($image) {
                $imageEntity = new VendorImage();
                $imageEntity->setPath($image->getPath());
                $imageEntity->setOwner($vendor);
                $vendor->setImage($imageEntity);

                $image->setPath(null);

                $this->entityManager->persist($image);
            }
        }
    }
}
