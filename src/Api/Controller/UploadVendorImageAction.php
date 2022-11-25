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
use ApiPlatform\Symfony\Validator\Exception\ValidationException;
use BitBag\OpenMarketplace\Entity\VendorImageInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\VendorImageFactoryInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Webmozart\Assert\Assert;

final class UploadVendorImageAction
{
    private VendorImageFactoryInterface $vendorImageFactory;

    private RepositoryInterface $vendorImageRepository;

    private ImageUploaderInterface $imageUploader;

    private IriConverterInterface $iriConverter;

    private ValidatorInterface $validator;

    public function __construct(
        VendorImageFactoryInterface $vendorImageFactory,
        RepositoryInterface $vendorImageRepository,
        ImageUploaderInterface $imageUploader,
        IriConverterInterface $iriConverter,
        ValidatorInterface $validator
    ) {
        $this->vendorImageFactory = $vendorImageFactory;
        $this->vendorImageRepository = $vendorImageRepository;
        $this->imageUploader = $imageUploader;
        $this->iriConverter = $iriConverter;
        $this->validator = $validator;
    }

    public function __invoke(Request $request): VendorImageInterface
    {
        $image = $this->vendorImageFactory->createNew();

        /** @var UploadedFile $file */
        $file = $request->files->get('file');
        $image->setFile($file);

        $owner = null;
        /** @var string $ownerIri */
        $ownerIri = $request->request->get('owner');
        if (null !== $ownerIri) {
            /** @var VendorInterface $owner */
            $owner = $this->iriConverter->getItemFromIri($ownerIri);
            Assert::isInstanceOf($owner, VendorInterface::class);
            $image->setOwner($owner);
        }

        $violations = $this->validator->validate($image, null, ['ApiUploadVendorImage']);
        if (0 !== \count($violations)) {
            throw new ValidationException($violations);
        }

        $oldImage = $owner->getImage();
        if (null !== $oldImage) {
            $this->vendorImageRepository->remove($oldImage);
        }
        $owner->setImage($image);

        $this->imageUploader->upload($image);

        return $image;
    }
}
