<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorBackgroundImageInterface;
use BitBag\OpenMarketplace\Entity\VendorBackgroundImageInterface;
use BitBag\OpenMarketplace\Factory\VendorBackgroundImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class UploadVendorBackgroundImageHandler
{
    private VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory;

    private ImageUploaderInterface $imageUploader;

    private ObjectManager $manager;

    private RepositoryInterface $vendorBackgroundImageRepository;

    public function __construct(
        VendorBackgroundImageFactoryInterface $vendorBackgroundImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        RepositoryInterface $vendorBackgroundImageRepository
    ) {
        $this->vendorBackgroundImageFactory = $vendorBackgroundImageFactory;
        $this->imageUploader = $imageUploader;
        $this->manager = $manager;
        $this->vendorBackgroundImageRepository = $vendorBackgroundImageRepository;
    }

    public function __invoke(UploadVendorBackgroundImageInterface $command): VendorBackgroundImageInterface
    {
        if (!$command->getFile()) {
            throw new \DomainException('File should be set');
        }

        $owner = $command->getOwner();
        if (!$owner) {
            throw new \DomainException('Owner should be set');
        }

        $backgroundImage = $this->vendorBackgroundImageFactory->createNew();
        $backgroundImage->setFile($command->getFile());
        $backgroundImage->setOwner($owner);

        $oldImage = $owner->getBackgroundImage();
        if (null !== $oldImage) {
            $this->vendorBackgroundImageRepository->remove($oldImage);
        }
        $owner->setBackgroundImage($backgroundImage);

        $this->imageUploader->upload($backgroundImage);

        $this->manager->persist($owner);
        $this->manager->persist($backgroundImage);

        return $backgroundImage;
    }
}
