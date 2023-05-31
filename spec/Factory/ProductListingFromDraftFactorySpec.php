<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Factory;

use BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Cloner\DraftPricingClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\DraftCloner\Cloner\DraftTranslationClonerInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeValueInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\ListingInterface;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersister;
use BitBag\OpenMarketplace\Component\ProductListing\ListingPersisterInterface;
use BitBag\OpenMarketplace\Entity\VendorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductListingFromDraftFactorySpec extends ObjectBehavior
{
    public function let(
        FactoryInterface $productListingFactory,
        FactoryInterface $draftFactory,
        DraftTranslationClonerInterface $productListingTranslationCloner,
        DraftPricingClonerInterface $productListingPricingCloner
    ): void {
        $this->beConstructedWith(
            $productListingFactory,
            $draftFactory,
            $productListingTranslationCloner,
            $productListingPricingCloner
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ListingPersister::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ListingPersisterInterface::class);
    }

    public function it_returns_product_listing(
        FactoryInterface $productListingFactory,
        ListingInterface $productListing,
        DraftInterface $productDraft,
        VendorInterface $vendor
    ): void {
        $productListingFactory->createNew()
            ->willReturn($productListing);

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection());

        $productDraft->getCode()
            ->willReturn('code');

        $productListing->setCode('code')
            ->shouldBeCalled();

        $productListing->insertDraft($productDraft)
            ->shouldBeCalled();

        $productListing->setVendor($vendor)
            ->shouldBeCalled();

        $this->createNewProductListing($productDraft, $vendor);

        $productDraft->setProductListing($productListing)->shouldHaveBeenCalled();
    }

    public function it_returns_product_listing_clone(
        FactoryInterface $draftFactory,
        ListingInterface $productListing,
        DraftInterface $productDraft,
        DraftInterface $newProductDraft,
        DraftTranslationClonerInterface $productListingTranslationCloner,
        DraftPricingClonerInterface $productListingPricingCloner,
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

        $productListing->insertDraft($newProductDraft)->shouldBeCalled();
        $productListing->setVerificationStatus(DraftInterface::STATUS_CREATED)
            ->shouldBeCalled();

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

        $productListingTranslationCloner->clone($productDraft, $newProductDraft)
            ->shouldBeCalled();

        $productListingPricingCloner->clone($productDraft, $newProductDraft)
            ->shouldBeCalled();

        $newProductDraft->setProductListing($productListing)
            ->shouldBeCalled();

        $this->getLatestDraft($productDraft);
    }

    public function it_formats_translations(
        DraftInterface $productDraft
    ): void {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection());

        $this->rejoinRelations($productDraft);
    }
}
