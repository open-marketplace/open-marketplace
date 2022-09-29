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
use BitBag\SyliusMultiVendorMarketplacePlugin\Converter\AttributesConverterInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductFromDraftFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Operator\ProductDraftFilesOperatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Operator\ProductDraftTaxonsOperatorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductFromDraftUpdaterInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;

final class ProductDraftAcceptanceOperatorSpec extends ObjectBehavior
{
    public function let(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductDraftFilesOperatorInterface $filesOperator,
        AttributesConverterInterface $attributesConverter,
        EntityManagerInterface $entityManager,
        ProductDraftTaxonsOperatorInterface $productDraftTaxonsOperator
    ): void {
        $this->beConstructedWith(
            $productFromDraftFactory,
            $productFromDraftUpdater,
            $filesOperator,
            $attributesConverter,
            $entityManager,
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

        $productFromDraftUpdater->updateProduct($productDraft)
            ->willReturn(null);

        $productFromDraftFactory->createSimpleProduct($productDraft)->willReturn($newProduct);
        $attributesConverter->convert($productDraft, $newProduct);
        $this->acceptProductDraft($productDraft);
    }
}
