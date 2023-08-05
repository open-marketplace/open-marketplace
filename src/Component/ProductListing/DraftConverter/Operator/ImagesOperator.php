<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\Product\Factory\ProductImageFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Gaufrette\Filesystem;

final class ImagesOperator implements ImagesOperatorInterface
{
    public function __construct(
        private Filesystem $filesystem,
        private ProductImageFactoryInterface $productImageFactory
    ) {

    }

    public function copyFilesToProduct(DraftInterface $productDraft, ProductInterface $cratedProduct): void
    {
        foreach ($productDraft->getImages() as $image) {
            $newImage = $this->productImageFactory->createNew();

            $newImage->setType($image->getType());
            $newImage->setOwner($cratedProduct);

            /** @var string $key */
            $key = $image->getPath();
            $nameSuffix = '-new.';

            /** @var string $file */
            $file = $this->filesystem->read($key);

            $path = explode('.', $key)[0];
            $fileType = explode('.', $key)[1];

            $newKey = $path . $nameSuffix . $fileType;

            $this->filesystem->write($newKey, $file, true);

            $newImage->setPath($newKey);

            $cratedProduct->addImage($newImage);
        }
    }

    public function removeOldFiles(ProductInterface $product): void
    {
        foreach ($product->getImages() as $image) {
            /** @var string $key */
            $key = $image->getPath();
            if ($this->filesystem->has($key)) {
                $this->filesystem->delete($key);
            }
        }
        $product->resetImages();
    }
}
