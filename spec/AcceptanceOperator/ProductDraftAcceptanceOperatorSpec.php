<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\AcceptanceOperator;

use BitBag\SyliusMultiVendorMarketplacePlugin\AcceptanceOperator\ProductDraftAcceptanceOperator;
use BitBag\SyliusMultiVendorMarketplacePlugin\AcceptanceOperator\ProductDraftAcceptanceOperatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Operator\ProductDraftFilesOperatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Operator\ProductDraftTaxonsOperator;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductFromDraftUpdaterInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ProductInterface;

final class ProductDraftAcceptanceOperatorSpec extends ObjectBehavior
{
    public function let(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $filesOperator,
        ProductDraftTaxonsOperator $productDraftTaxonsOperator
    ): void {
        $this->beConstructedWith(
            $productFromDraftFactory,
            $productFromDraftUpdater,
            $filesOperator,
            $productDraftTaxonsOperator
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductDraftAcceptanceOperator::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ProductDraftAcceptanceOperatorInterface::class);
    }

    public function it_creates_new_product(
        ProductDraftInterface $productDraft,
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductListingInterface $productListing,
        ProductDraftTaxonsOperator $productDraftTaxonsOperator,
        \BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface $product
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn(null);

        $productFromDraftFactory->createSimpleProduct($productDraft)
            ->willReturn($product);

        $productDraftTaxonsOperator->copyTaxonsToProduct($productDraft, $product)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }

    public function it_updates_existing_product(
        ProductDraftInterface $productDraft,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $filesOperator,
        ProductListingInterface $productListing,
        ProductInterface $product,
        \BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface $updatedProduct,
        ProductDraftTaxonsOperator $productDraftTaxonsOperator
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn($product);

        $productFromDraftUpdater->updateProduct($productDraft)
            ->willReturn($updatedProduct);

        $filesOperator->removeOldFiles($updatedProduct)->shouldBeCalledTimes(1);
        $filesOperator->copyFilesToProduct($productDraft, $updatedProduct)->shouldBeCalledTimes(1);

        $productDraftTaxonsOperator->updateTaxonsInProduct($productDraft, $updatedProduct)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }
}
