<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\Controller;

use ApiPlatform\Core\Api\IriConverterInterface;
use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Webmozart\Assert\Assert;

final class UploadVendorImageAction
{
    private VendorImageFactoryInterface $vendorImageFactory;
    private RepositoryInterface $vendorImageRepository;
    private ImageUploaderInterface $imageUploader;
    private IriConverterInterface $iriConverter;

    public function __construct(
        VendorImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        ImageUploaderInterface $imageUploader,
        IriConverterInterface $iriConverter
    ) {
        $this->vendorImageFactory = $vendorImageFactory;
        $this->vendorImageRepository = $vendorImageRepository;
        $this->imageUploader = $imageUploader;
        $this->iriConverter = $iriConverter;
    }

    public function __invoke(Request $request): VendorImageInterface
    {
        /** @var UploadedFile $file */
        $file = $request->files->get('file');

        /** @var VendorImageInterface $image */
        $image = $this->vendorImageFactory->createNew();
        $image->setFile($file);

        /** @var string $ownerIri */
        $ownerIri = $request->request->get('owner');
        Assert::notEmpty($ownerIri);

        /** @var ResourceInterface|VendorInterface $owner */
        $owner = $this->iriConverter->getItemFromIri($ownerIri);
        Assert::isInstanceOf($owner, VendorInterface::class);
        $image->setOwner($owner);

        $oldImage = $owner->getImage();
        if ($oldImage !== null) {
            $this->vendorImageRepository->remove($oldImage);
        }
        $owner->setImage($image);

        $this->imageUploader->upload($image);

        return $image;
    }
}