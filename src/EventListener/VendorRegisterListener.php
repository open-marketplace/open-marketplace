<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\EventListener;

use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Generator\VendorSlugGeneratorInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;

final class VendorRegisterListener
{
    private VendorSlugGeneratorInterface $vendorSlugGenerator;

    private ImageUploaderInterface $fileUploader;

    public function __construct(
        VendorSlugGeneratorInterface $vendorSlugGenerator,
        ImageUploaderInterface $fileUploader
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
            $this->fileUploader->upload($vendorImage);

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
