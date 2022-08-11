<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\AcceptanceOperator;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Operator\ProductDraftFilesOperatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductFromDraftUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ProductInterface;

final class ProductDraftAcceptanceOperator implements ProductDraftAcceptanceOperatorInterface
{
    private ProductFromDraftFactoryInterface $productFromDraftFactory;

    private ProductFromDraftUpdaterInterface $productFromDraftUpdater;

    private ProductDraftFilesOperatorInterface $productDraftFilesOperator;

    public function __construct(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $productDraftFilesOperator,
    ) {
        $this->productFromDraftFactory = $productFromDraftFactory;
        $this->productFromDraftUpdater = $productFromDraftUpdater;
        $this->productDraftFilesOperator = $productDraftFilesOperator;
    }

    public function acceptProductDraft(ProductDraftInterface $productDraft): ProductInterface
    {
        if (!$productDraft->getProductListing()->getProduct()) {
            $cratedProduct =  $this->productFromDraftFactory->createSimpleProduct($productDraft);
            $this->productDraftFilesOperator->copyFilesToProduct($productDraft, $cratedProduct);
            return $cratedProduct;
        }
        else {
            $product = $this->productFromDraftUpdater->updateProduct($productDraft);

            $this->productDraftFilesOperator->removeOldFiles($product);

            $this->productDraftFilesOperator->copyFilesToProduct($productDraft, $product);
            $this->entityManager->persist($product);

            return $product;
        }
    }
}
