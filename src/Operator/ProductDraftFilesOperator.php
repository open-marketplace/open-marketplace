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
use Sylius\Component\Core\Model\ProductImage;

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

            $clone = $this->productImageFactory->createNew();

            $clone->setType($image->getType());

            $key = $image->getPath();
            $file = $this->filesystem->read($key);

            $path = explode(".", $key)[0];
            $fileType = explode(".", $key)[1];

            $newKey = $path."1.".$fileType;

            $this->filesystem->write($newKey, $file);

            $clone->setPath($newKey);

            $cratedProduct->addImage($clone);
        };
    }
}
