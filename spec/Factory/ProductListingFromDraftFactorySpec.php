<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ProductListingPricingClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Cloner\ProductListingTranslationClonerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeValueInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductListingFromDraftFactory;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductListingFromDraftFactoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingFromDraftFactorySpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $productListingFactoryInterface,
        FactoryInterface $draftFactory,
        ProductListingTranslationClonerInterface $productListingTranslationCloner,
        ProductListingPricingClonerInterface $productListingPricingCloner
    ): void {
        $this->beConstructedWith(
            $productListingFactoryInterface,
            $draftFactory,
            $productListingTranslationCloner,
            $productListingPricingCloner
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductListingFromDraftFactory::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ProductListingFromDraftFactoryInterface::class);
    }

    public function it_returns_product_listing(
        FactoryInterface $productListingFactoryInterface,
        ProductListingInterface $productListing,
        ProductDraftInterface $productDraft,
        VendorInterface $vendor
    ): void {
        $productListingFactoryInterface->createNew()
            ->willReturn($productListing);

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection());

        $productDraft->getCode()
            ->willReturn('code');

        $productListing->setCode('code')
            ->shouldBeCalled();

        $productListing->addProductDrafts($productDraft)
            ->shouldBeCalled();

        $productListing->setVendor($vendor)
            ->shouldBeCalled();

        $productDraft->setProductListing($productListing)
            ->shouldBeCalled();

        $this->createNew($productDraft, $vendor);
    }

    public function it_returns_product_listing_clone(
        FactoryInterface $draftFactory,
        ProductListingInterface $productListing,
        ProductDraftInterface $productDraft,
        ProductDraftInterface $newProductDraft,
        ProductListingTranslationClonerInterface $productListingTranslationCloner,
        ProductListingPricingClonerInterface $productListingPricingCloner,
        DraftAttributeValueInterface $attributeValue,
    ): void {
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $draftFactory->createNew()
            ->willReturn($newProductDraft);

        $productDraft->getVersionNumber()
            ->willReturn(1);

        $productDraft->getCode()
            ->willReturn('code');

        $productDraft->getImages()->willReturn(new ArrayCollection([]));

        $newProductDraft->setVersionNumber(1)
            ->shouldBeCalled();

        $newProductDraft->incrementVersion()
            ->shouldBeCalled();

        $newProductDraft->setCode('code')
            ->shouldBeCalled();

        $newProductDraft->setAttributesFrom($productDraft)->shouldBeCalledOnce();

        $newProductDraft->setProductTaxonsFrom($productDraft)
            ->shouldBeCalled();

        $newProductDraft->setProductListing($productListing)
            ->shouldBeCalled();

        $productListingTranslationCloner->cloneTranslation($newProductDraft, $productDraft)
            ->shouldBeCalled();

        $productListingPricingCloner->clonePrice($newProductDraft, $productDraft)
            ->shouldBeCalled();

        $newProductDraft->setProductListing($productListing)
            ->shouldBeCalled();

        $this->createClone($productDraft);
    }

    public function it_formats_translations(
        ProductDraftInterface $productDraft
    ): void {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection());

        $this->saveEdit($productDraft);
    }
}
