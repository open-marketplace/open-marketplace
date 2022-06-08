<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\EventListener;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Vendor;
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
        /** @var Vendor $vendor */
        $vendor = $event->getSubject();

        if ($vendor->getImage()) {
            /** @var UploadedFile $uploadedImage */
            $uploadedImage = ($vendor->getImage())->getFile();

            $filename = $this->fileUploader->upload($uploadedImage, $_ENV['LOGO_DIRECTORY']);
            $vendor->getImage()->setPath($filename);
            $vendor->getImage()->setOwner($vendor);
        }
    }

    public function generateSlug(ResourceControllerEvent $event): void
    {
        /** @var VendorInterface $vendor */
        $vendor = $event->getSubject();

        $vendor->setSlug($this->vendorSlugGenerator->generateSlug($vendor->getCompanyName()));
    }
}
