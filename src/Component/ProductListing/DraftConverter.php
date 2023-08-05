<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface as BitBagProductInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator\AttributesOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator\ImagesOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator\TaxonsOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\SimpleProductFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\SimpleProductUpdaterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Sylius\Component\Core\Model\ProductInterface;

final class DraftConverter implements DraftConverterInterface
{
    public function __construct(
        private SimpleProductFactoryInterface $simpleProductFactory,
        private SimpleProductUpdaterInterface $productFromDraftUpdater,
        private ImagesOperatorInterface $imagesOperator,
        private AttributesOperatorInterface $attributesOperator,
        private TaxonsOperatorInterface $taxonsOperator
    ) {

    }

    public function convertToSimpleProduct(DraftInterface $productDraft): ProductInterface
    {
        $productListing = $productDraft->getProductListing();
        if (!$productListing->getProduct()) {
            $product = $this->simpleProductFactory->create($productDraft);
            $this->imagesOperator->copyFilesToProduct($productDraft, $product);
            $this->taxonsOperator->copyTaxonsToProduct($productDraft, $product);
            $this->attributesOperator->convert($productDraft, $product);
            $productListing->accept();

            return $product;
        }

        /** @var BitBagProductInterface $product */
        $product = $this->productFromDraftUpdater->update($productDraft);

        $this->imagesOperator->removeOldFiles($product);
        $this->imagesOperator->copyFilesToProduct($productDraft, $product);
        $this->taxonsOperator->updateTaxonsInProduct($productDraft, $product);
        $this->attributesOperator->convert($productDraft, $product);
        $productListing->accept();

        return $product;
    }
}
