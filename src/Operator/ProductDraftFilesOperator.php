<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Operator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductImageFactoryInterface;
use Gaufrette\Filesystem;

final class ProductDraftFilesOperator implements ProductDraftFilesOperatorInterface
{
    private Filesystem $filesystem;

    private ProductImageFactoryInterface $productImageFactory;

    public function __construct(Filesystem $filesystem, ProductImageFactoryInterface $productImageFactory)
    {
        $this->filesystem = $filesystem;
        $this->productImageFactory = $productImageFactory;
    }

    public function copyFilesToProduct(ProductDraftInterface $productDraft, ProductInterface $cratedProduct): void
    {
        foreach ($productDraft->getImages() as $image){
            $newImage = $this->productImageFactory->createNew();

            $newImage->setType($image->getType());
            $newImage->setOwner($cratedProduct);

            $key = $image->getPath();
            $nameSuffix = "1.";

            $file = $this->filesystem->read($key);

            $path = explode(".", $key)[0];
            $fileType = explode(".", $key)[1];

            $newKey = $path.$nameSuffix.$fileType;

            $this->filesystem->write($newKey, $file, true);

            $newImage->setPath($newKey);

            $cratedProduct->addImage($newImage);
        }
    }

    public function removeOldFiles(ProductInterface $product): void
    {
        foreach($product->getImages() as $image){
            $key = $image->getPath();

            if($this->filesystem->has($key)) {
                $this->filesystem->delete($key);
            }
            $product->removeImage($image);
        }
        $product->resetImages();
    }
}
