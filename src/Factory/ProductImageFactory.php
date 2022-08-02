<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use Gaufrette\Filesystem;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\ProductImage;
use Sylius\Component\Core\Model\ProductImageInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;

final class ProductImageFactory implements ProductImageFactoryInterface
{
    private ImageUploaderInterface $imageUploader;

    private Filesystem $filesystem;

    public function __construct(ImageUploaderInterface $imageUploader, Filesystem $filesystem)
    {
        $this->imageUploader = $imageUploader;
        $this->filesystem = $filesystem;
    }

    public function createNew(): ProductImageInterface
    {
        return new ProductImage();
    }

    public function createClone(ImageInterface $originalImage): ProductImageInterface
    {
        $clone = new ProductImage();
        $clone->setType($originalImage->getType());

        $key = $originalImage->getPath();
        $file = $this->filesystem->read($key);

        $path = explode(".", $key)[0];
        $fileType = explode(".", $key)[1];

        $newKey = $path."1.".$fileType;

        $this->filesystem->write($newKey, $file);

        $clone->setPath($newKey);

//        $this->imageUploader->upload($clone);

        return $clone;
    }
}
