<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Messenger\CommandHandler\Vendor;

use BitBag\OpenMarketplace\Api\Messenger\Command\Vendor\UploadVendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class UploadVendorImageHandler
{
    private VendorImageFactoryInterface $vendorImageFactory;

    private ImageUploaderInterface $imageUploader;

    private ObjectManager $manager;

    private RepositoryInterface $vendorImageRepository;

    public function __construct(
        VendorImageFactoryInterface $vendorImageFactory,
        ImageUploaderInterface $imageUploader,
        ObjectManager $manager,
        RepositoryInterface $vendorImageRepository
    ) {
        $this->vendorImageFactory = $vendorImageFactory;
        $this->imageUploader = $imageUploader;
        $this->manager = $manager;
        $this->vendorImageRepository = $vendorImageRepository;
    }

    public function __invoke(UploadVendorImageInterface $command): VendorImageInterface
    {
        if (!$command->getFile()) {
            throw new \DomainException('File should be set');
        }

        $owner = $command->getOwner();
        if (!$owner) {
            throw new \DomainException('Owner should be set');
        }

        $image = $this->vendorImageFactory->createNew();
        $image->setFile($command->getFile());
        $image->setOwner($owner);

        $oldImage = $owner->getImage();
        if (null !== $oldImage) {
            $this->vendorImageRepository->remove($oldImage);
        }
        $owner->setImage($image);

        $this->imageUploader->upload($image);

        $this->manager->persist($owner);
        $this->manager->persist($image);

        return $image;
    }
}
