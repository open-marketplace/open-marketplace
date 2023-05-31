<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\AcceptanceOperator;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Converter\AttributesConverterInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface as BitBagProductInterface;
use BitBag\OpenMarketplace\Factory\ProductFromDraftFactoryInterface;
use BitBag\OpenMarketplace\Operator\ProductDraftFilesOperatorInterface;
use BitBag\OpenMarketplace\Operator\ProductDraftTaxonsOperatorInterface;
use BitBag\OpenMarketplace\Updater\ProductFromDraftUpdaterInterface;
use Sylius\Component\Core\Model\ProductInterface;

final class ProductDraftAcceptanceOperator implements ProductDraftAcceptanceOperatorInterface
{
    private ProductFromDraftFactoryInterface $productFromDraftFactory;

    private ProductFromDraftUpdaterInterface $productFromDraftUpdater;

    private ProductDraftFilesOperatorInterface $productDraftFilesOperator;

    private AttributesConverterInterface $attributesConverter;

    private ProductDraftTaxonsOperatorInterface $productDraftTaxonsOperator;

    public function __construct(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $productDraftFilesOperator,
        AttributesConverterInterface $attributesConverter,
        ProductDraftTaxonsOperatorInterface $productDraftTaxonsOperator
    ) {
        $this->productFromDraftFactory = $productFromDraftFactory;
        $this->productFromDraftUpdater = $productFromDraftUpdater;
        $this->productDraftFilesOperator = $productDraftFilesOperator;
        $this->attributesConverter = $attributesConverter;
        $this->productDraftTaxonsOperator = $productDraftTaxonsOperator;
    }

    public function acceptProductDraft(DraftInterface $productDraft): ProductInterface
    {
        $productListing = $productDraft->getProductListing();
        if (!$productListing->getProduct()) {
            $product = $this->productFromDraftFactory->createSimpleProduct($productDraft);
            $this->productDraftFilesOperator->copyFilesToProduct($productDraft, $product);
            $this->productDraftTaxonsOperator->copyTaxonsToProduct($productDraft, $product);
            $this->attributesConverter->convert($productDraft, $product);
            $productListing->accept();

            return $product;
        }

        /** @var BitBagProductInterface $product */
        $product = $this->productFromDraftUpdater->updateProduct($productDraft);

        $this->productDraftFilesOperator->removeOldFiles($product);
        $this->productDraftFilesOperator->copyFilesToProduct($productDraft, $product);
        $this->productDraftTaxonsOperator->updateTaxonsInProduct($productDraft, $product);
        $this->attributesConverter->convert($productDraft, $product);
        $productListing->accept();

        return $product;
    }
}
