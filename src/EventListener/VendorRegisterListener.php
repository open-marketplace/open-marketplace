<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\EventListener;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Generator\VendorSlugGeneratorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Uploader\FileUploaderInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class VendorRegisterListener
{
    private VendorSlugGeneratorInterface $vendorSlugGenerator;

    private FileUploaderInterface $fileUploader;

    public function __construct(
        VendorSlugGeneratorInterface $vendorSlugGenerator,
        FileUploaderInterface $fileUploader
    ) {
        $this->vendorSlugGenerator = $vendorSlugGenerator;
        $this->fileUploader = $fileUploader;
    }

    public function uploadImage(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();

        /** @var VendorImageInterface $vendorImage */
        $vendorImage = $vendor->getImage();

        if (null !== $vendorImage) {
            /** @var UploadedFile $uploadedImage */
            $uploadedImage = $vendorImage->getFile();

            $filename = $this->fileUploader->upload($uploadedImage);
            $vendorImage->setPath($filename);
            $vendorImage->setOwner($vendor);
        }
    }

    public function generateSlug(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();

        if (null === $vendor->getCompanyName()) {
            throw new \Exception('Company name cannot be empty.');
        }

        $vendor->setSlug($this->vendorSlugGenerator->generateSlug($vendor->getCompanyName()));
    }
}