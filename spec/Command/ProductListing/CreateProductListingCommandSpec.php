<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Command\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ShopUserInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class CreateProductListingCommandSpec extends ObjectBehavior
{
    public function let(
        ProductListingRepositoryInterface $productListingRepository,
        FactoryInterface                  $productListingFactoryInterface,
        TokenStorageInterface             $tokenStorage,
        FactoryInterface                  $translationFactory,
        FactoryInterface                  $draftFactory,
        FactoryInterface                  $priceFactory,
        ProductDraftRepositoryInterface   $draftRepository
    ): void {
        $this->beConstructedWith(
            $productListingRepository,
            $productListingFactoryInterface,
            $tokenStorage,
            $translationFactory,
            $draftFactory,
            $priceFactory,
            $draftRepository
        );
    }

    public function it_creates_product_listing(
        FactoryInterface                  $productListingFactoryInterface,
        ProductDraftInterface             $productDraft,
        TokenStorageInterface             $tokenStorage,
        ShopUserInterface                 $shopUser,
        ProductListing                    $productListing,
        TokenInterface                    $token,
        ProductTranslationInterface       $productTranslation,
        ProductListingRepositoryInterface $productListingRepository,
        VendorInterface                   $vendor
    ) {
        $productListingFactoryInterface->createNew()
            ->willReturn($productListing);

        $tokenStorage->getToken()
            ->willReturn($token);

        $token->getUser()
            ->willReturn($shopUser);

        $shopUser->getVendor()
            ->willReturn($vendor);

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

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

        $productListingRepository->save($productListing)
            ->shouldBeCalled();

        $this->create($productDraft, false);
    }

    public function it_creates_product_listing_and_send(
        FactoryInterface                  $productListingFactoryInterface,
        ProductDraftInterface             $productDraft,
        TokenStorageInterface             $tokenStorage,
        ShopUserInterface                 $shopUser,
        ProductListing                    $productListing,
        TokenInterface                    $token,
        ProductTranslationInterface       $productTranslation,
        ProductListingRepositoryInterface $productListingRepository,
        VendorInterface                   $vendor
    ) {
        $productListingFactoryInterface->createNew()
            ->willReturn($productListing);

        $tokenStorage->getToken()
            ->willReturn($token);

        $token->getUser()
            ->willReturn($shopUser);

        $shopUser->getVendor()
            ->willReturn($vendor);

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $productDraft->getCode()
            ->willReturn('code');

        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION)
            ->shouldBeCalled();

        $productDraft->setPublishedAt(Argument::type('DateTime'))
            ->shouldBeCalled();

        $productListing->setCode('code')
            ->shouldBeCalled();

        $productListing->addProductDrafts($productDraft)
            ->shouldBeCalled();

        $productListing->setVendor($vendor)
            ->shouldBeCalled();

        $productDraft->setProductListing($productListing)
            ->shouldBeCalled();

        $productListingRepository->save($productListing)
            ->shouldBeCalled();

        $this->create($productDraft, true);
    }

    public function it_save_product(
        ProductDraftInterface           $productDraft,
        ProductTranslationInterface     $productTranslation,
        ProductDraftRepositoryInterface $productDraftRepository
    ) {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $this->saveEdit($productDraft, false);
    }

    public function it_save_product_and_send(
        ProductDraftInterface           $productDraft,
        ProductTranslationInterface     $productTranslation,
        ProductDraftRepositoryInterface $productDraftRepository
    ) {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION)
            ->shouldBeCalled();

        $productDraft->setPublishedAt(Argument::type('DateTime'))
            ->shouldBeCalled();

        $this->saveEdit($productDraft, true);
    }

    public function it_clone(
        ProductListingInterface      $productListing,
        ProductDraftInterface        $productDraft,
        ProductDraftInterface        $newProductDraft,
        FactoryInterface             $draftFactory,
        FactoryInterface             $translationFactory,
        ProductTranslationInterface  $translation,
        ProductTranslationInterface  $newTranslation,
        ProductListingPriceInterface $price,
        ProductListingPriceInterface $newPrice,
        FactoryInterface             $priceFactory
    ) {
        // Clone product stubs
        $productDraft->getProductListing()
            ->willReturn($productListing);

        $draftFactory->createNew()
            ->willReturn($newProductDraft);

        $productDraft->getVersionNumber()
            ->willReturn(1);

        $productDraft->getCode()
            ->willReturn('code');

        // Clone translation stubs
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$translation->getWrappedObject()]));

        $translationFactory->createNew()
            ->willReturn($newTranslation);

        $translation->getName()
            ->willReturn('name');

        $translation->getDescription()
            ->willReturn('description');

        $translation->getLocale()
            ->willReturn('en_US');

        $translation->getMetaDescription()
            ->willReturn('meta description');

        $translation->getMetaKeywords()
            ->willReturn('meta keywords');

        $translation->getSlug()
            ->willReturn('slug');

        $translation->getShortDescription()
            ->willReturn('short description');

        // Clone price stubs
        $productDraft->getProductListingPrice()
            ->willReturn(new ArrayCollection([$price->getWrappedObject()]));

        $priceFactory->createNew()
            ->willReturn($newPrice);

        $price->getChannelCode()
            ->willReturn('en_US');

        $price->getPrice()
            ->willReturn(10);

        $price->getOriginalPrice()
            ->willReturn(10);

        $price->getMinimumPrice()
            ->willReturn(10);

        $newPrice->getChannelCode()
            ->willReturn('en_US');

        // Clone product mocks
        $newProductDraft->setVersionNumber(1)
            ->shouldBeCalled();

        $newProductDraft->newVersion()
            ->shouldBeCalled();

        $newProductDraft->setCode('code')
            ->shouldBeCalled();

        $newProductDraft->setProductListing($productListing)
            ->shouldBeCalled();

        // Clone translation mocks
        $translation->getName()
            ->shouldBeCalled();

        $translation->getDescription()
            ->shouldBeCalled();

        $translation->getLocale()
            ->shouldBeCalled();

        $translation->getMetaDescription()
            ->shouldBeCalled();

        $translation->getMetaKeywords()
            ->shouldBeCalled();

        $translation->getSlug()
            ->shouldBeCalled();

        $translation->getShortDescription()
            ->shouldBeCalled();

        $newTranslation->setName('name')
            ->shouldBeCalled();

        $newTranslation->setProductDraft($newProductDraft)
            ->shouldBeCalled();

        $newTranslation->setDescription('description')
            ->shouldBeCalled();

        $newTranslation->setLocale('en_US')
            ->shouldBeCalled();

        $newTranslation->setMetaDescription('meta description')
            ->shouldBeCalled();

        $newTranslation->setMetaKeywords('meta keywords')
            ->shouldBeCalled();

        $newTranslation->setSlug('slug')
            ->shouldBeCalled();

        $newTranslation->setShortDescription('short description')
            ->shouldBeCalled();

        $newProductDraft->addTranslationsWithKey($newTranslation, 'en_US')
            ->shouldBeCalled();

        // Clone price mocks
        $price->getPrice()
            ->shouldBeCalled();

        $price->getMinimumPrice()
            ->shouldBeCalled();

        $price->getOriginalPrice()
            ->shouldBeCalled();

        $newPrice->setChannelCode('en_US')
            ->shouldBeCalled();

        $newPrice->setPrice(10)
            ->shouldBeCalled();

        $newPrice->setMinimumPrice(10)
            ->shouldBeCalled();

        $newPrice->setOriginalPrice(10)
            ->shouldBeCalled();

        $newPrice->setProductDraft($newProductDraft)
            ->shouldBeCalled();

        $newProductDraft->addProductListingPriceWithKey($newPrice, 'en_US')
            ->shouldBeCalled();

        $this->cloneProduct($productDraft, false);
    }
}
