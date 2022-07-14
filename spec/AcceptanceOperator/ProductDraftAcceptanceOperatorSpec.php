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
use BitBag\SyliusMultiVendorMarketplacePlugin\Updater\ProductFromDraftUpdaterInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ProductInterface;

final class ProductDraftAcceptanceOperatorSpec extends ObjectBehavior
{
    public function let(
        ProductFromDraftFactoryInterface $productFromDraftFactory,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater
    ): void {
        $this->beConstructedWith(
            $productFromDraftFactory,
            $productFromDraftUpdater
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
        ProductListingInterface $productListing
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn(null);

        $productFromDraftFactory->createSimpleProduct($productDraft)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }

    public function it_updates_existing_product(
        ProductDraftInterface $productDraft,
        ProductFromDraftUpdaterInterface $productFromDraftUpdater,
        ProductListingInterface $productListing,
        ProductInterface $product
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $productListing->getProduct()
            ->willReturn($product);

        $productFromDraftUpdater->updateProduct($productDraft)
            ->shouldBeCalled();

        $this->acceptProductDraft($productDraft);
    }
}
