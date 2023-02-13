<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Cloner\ProductListingPricingClonerInterface;
use BitBag\OpenMarketplace\Cloner\ProductListingTranslationClonerInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductListingInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use BitBag\OpenMarketplace\Factory\ProductListingFromDraftFactory;
use BitBag\OpenMarketplace\Factory\ProductListingFromDraftFactoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
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

        $productListing->addProductDraft($productDraft)
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


        $productDraft->isShippingRequired()->willReturn(true);
        $productDraft->getShippingCategory()->willReturn(null);

        $newProductDraft->setShippingRequired(true)->shouldBeCalled();
        $newProductDraft->setShippingCategory(null)->shouldBeCalled();

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
