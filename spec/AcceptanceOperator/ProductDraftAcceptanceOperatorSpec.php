<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\AcceptanceOperator;

use BitBag\OpenMarketplace\AcceptanceOperator\ProductDraftAcceptanceOperator;
use BitBag\OpenMarketplace\AcceptanceOperator\ProductDraftAcceptanceOperatorInterface;
use BitBag\OpenMarketplace\Converter\AttributesConverterInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Factory\ProductFromDraftFactoryInterface;
use BitBag\OpenMarketplace\Operator\ProductDraftFilesOperatorInterface;
use BitBag\OpenMarketplace\Operator\ProductDraftTaxonsOperatorInterface;
use BitBag\OpenMarketplace\Updater\ProductFromDraftUpdaterInterface;
use PhpSpec\ObjectBehavior;

final class ProductDraftAcceptanceOperatorSpec extends ObjectBehavior
{
    public function let(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $filesOperator,
        AttributesConverterInterface $attributesConverter,
        ProductDraftTaxonsOperatorInterface $productDraftTaxonsOperator
    ): void {
        $this->beConstructedWith(
            $productFromDraftFactory,
            $productFromDraftUpdater,
            $filesOperator,
            $attributesConverter,
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
        ProductDraftTaxonsOperatorInterface $productDraftTaxonsOperator,
        ProductInterface $product
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn(null);

        $productListing->accept($productDraft)
            ->shouldBeCalledOnce();

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
        ProductInterface $updatedProduct,
        ProductDraftTaxonsOperatorInterface $productDraftTaxonsOperator
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn($product);

        $productListing->accept($productDraft)
            ->shouldBeCalledOnce();

        $productFromDraftUpdater->updateProduct($productDraft)
            ->willReturn($updatedProduct);

        $filesOperator->removeOldFiles($updatedProduct)->shouldBeCalledTimes(1);
        $filesOperator->copyFilesToProduct($productDraft, $updatedProduct)->shouldBeCalledTimes(1);

        $productDraftTaxonsOperator->updateTaxonsInProduct($productDraft, $updatedProduct)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }

    public function it_converts_attributes_to_existing_product(
        ProductDraftInterface $productDraft,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $filesOperator,
        ProductListingInterface $productListing,
        ProductInterface $product,
        ProductInterface $updatedProduct,
        AttributesConverterInterface $attributesConverter
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn($product);

        $productListing->accept($productDraft)
            ->shouldBeCalledOnce();

        $productFromDraftUpdater->updateProduct($productDraft)
            ->willReturn($updatedProduct);

        $filesOperator->removeOldFiles($updatedProduct)->shouldBeCalledTimes(1);
        $filesOperator->copyFilesToProduct($productDraft, $updatedProduct)->shouldBeCalledTimes(1);

        $attributesConverter->convert($productDraft, $updatedProduct);
        $this->acceptProductDraft($productDraft);
    }

    public function it_converts_attributes_to_new_product(
        ProductDraftInterface $productDraft,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductDraftFilesOperatorInterface $filesOperator,
        ProductListingInterface $productListing,
        ProductInterface $product,
        ProductInterface $newProduct,
        AttributesConverterInterface $attributesConverter
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn(null);

        $productListing->accept($productDraft)
            ->shouldBeCalledOnce();

        $productFromDraftUpdater->updateProduct($productDraft)
            ->willReturn(null);

        $productFromDraftFactory->createSimpleProduct($productDraft)->willReturn($newProduct);
        $attributesConverter->convert($productDraft, $newProduct);
        $this->acceptProductDraft($productDraft);
    }
}
