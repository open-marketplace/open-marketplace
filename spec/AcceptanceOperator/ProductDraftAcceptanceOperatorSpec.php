<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\AcceptanceOperator;

use BitBag\OpenMarketplace\Component\Product\Entity\ProductInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator\AttributesOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator\ImagesOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\Operator\TaxonsOperatorInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\SimpleProductFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverter\SimpleProductUpdaterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftConverterInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use PhpSpec\ObjectBehavior;

final class ProductDraftAcceptanceOperatorSpec extends ObjectBehavior
{
    public function let(
        SimpleProductFactoryInterface $productFromDraftFactory,
        SimpleProductUpdaterInterface $productFromDraftUpdater,
        ImagesOperatorInterface $filesOperator,
        AttributesOperatorInterface $attributesConverter,
        TaxonsOperatorInterface $productDraftTaxonsOperator
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
        $this->shouldHaveType(DraftConverter::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(DraftConverterInterface::class);
    }

    public function it_creates_new_product(
        DraftInterface $productDraft,
        SimpleProductFactoryInterface $productFromDraftFactory,
        ListingInterface $productListing,
        TaxonsOperatorInterface $productDraftTaxonsOperator,
        ProductInterface $product
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn(null);

        $productListing->accept()
            ->shouldBeCalledOnce();

        $productFromDraftFactory->create($productDraft)
            ->willReturn($product);

        $productDraftTaxonsOperator->copyTaxonsToProduct($productDraft, $product)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }

    public function it_updates_existing_product(
        DraftInterface $productDraft,
        SimpleProductUpdaterInterface $productFromDraftUpdater,
        ImagesOperatorInterface $filesOperator,
        ListingInterface $productListing,
        ProductInterface $product,
        ProductInterface $updatedProduct,
        TaxonsOperatorInterface $productDraftTaxonsOperator
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn($product);

        $productListing->accept()
            ->shouldBeCalledOnce();

        $productFromDraftUpdater->update($productDraft)
            ->willReturn($updatedProduct);

        $filesOperator->removeOldFiles($updatedProduct)->shouldBeCalledTimes(1);
        $filesOperator->copyFilesToProduct($productDraft, $updatedProduct)->shouldBeCalledTimes(1);

        $productDraftTaxonsOperator->updateTaxonsInProduct($productDraft, $updatedProduct)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }

    public function it_converts_attributes_to_existing_product(
        DraftInterface $productDraft,
        SimpleProductUpdaterInterface $productFromDraftUpdater,
        ImagesOperatorInterface $filesOperator,
        ListingInterface $productListing,
        ProductInterface $product,
        ProductInterface $updatedProduct,
        AttributesOperatorInterface $attributesConverter
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn($product);

        $productListing->accept()
            ->shouldBeCalledOnce();

        $productFromDraftUpdater->update($productDraft)
            ->willReturn($updatedProduct);

        $filesOperator->removeOldFiles($updatedProduct)->shouldBeCalledTimes(1);
        $filesOperator->copyFilesToProduct($productDraft, $updatedProduct)->shouldBeCalledTimes(1);

        $attributesConverter->convert($productDraft, $updatedProduct);
        $this->acceptProductDraft($productDraft);
    }

    public function it_converts_attributes_to_new_product(
        DraftInterface $productDraft,
        SimpleProductUpdaterInterface $productFromDraftUpdater,
        SimpleProductFactoryInterface $productFromDraftFactory,
        ListingInterface $productListing,
        ProductInterface $newProduct,
        AttributesOperatorInterface $attributesConverter
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn(null);

        $productListing->accept()
            ->shouldBeCalledOnce();

        $productFromDraftUpdater->update($productDraft)
            ->willReturn(null);

        $productFromDraftFactory->create($productDraft)->willReturn($newProduct);
        $attributesConverter->convert($productDraft, $newProduct);
        $this->acceptProductDraft($productDraft);
    }
}
