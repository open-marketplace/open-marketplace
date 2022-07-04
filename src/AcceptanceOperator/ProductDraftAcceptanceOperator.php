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
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductFromDraftUpdaterInterface;
use Sylius\Component\Core\Model\ProductInterface;

final class ProductDraftAcceptanceOperator implements ProductDraftAcceptanceOperatorInterface
{
    private ProductFromDraftFactoryInterface $productFromDraftFactory;

    private ProductFromDraftUpdaterInterface $productFromDraftUpdater;

    public function __construct(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater
    ) {
        $this->productFromDraftFactory = $productFromDraftFactory;
        $this->productFromDraftUpdater = $productFromDraftUpdater;
    }

    public function acceptProductDraft(ProductDraftInterface $productDraft): ProductInterface
    {
        if (!$productDraft->getProductListing()->getProduct()) {
            return $this->productFromDraftFactory->createSimpleProduct($productDraft);
        }

        return $this->productFromDraftUpdater->updateProduct($productDraft);
    }
}
