<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusMultiVendorMarketplacePlugin\Command\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\Customer;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\CustomerInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraft;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListing;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductDraftRepositoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage;
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
    ): void
    {
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
        CustomerInterface                 $customer,
        VendorInterface                   $vendor
    )
    {
        $productListingFactoryInterface->createNew()
            ->willReturn($productListing);

        $tokenStorage->getToken()
            ->willReturn($token);

        $token->getUser()
            ->willReturn($shopUser);

        $shopUser->getCustomer()
            ->willReturn($customer);

        $customer->getVendor()
            ->willReturn($vendor);

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $productTranslation->setProductDraft($productDraft)
            ->should(new ProductListing());

        $productListing->setCode('code')
            ->shouldBeCalled();

        $productDraft->getCode()
            ->willReturn('code');

        $productListing->addProductDrafts($productDraft)
            ->shouldBeCalled();

        $productListing->setVendor($shopUser)
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
        CustomerInterface                 $customer,
        VendorInterface                   $vendor
    )
    {
        $productListingFactoryInterface->createNew()
            ->willReturn($productListing);

        $tokenStorage->getToken()
            ->willReturn($token);

        $token->getUser()
            ->willReturn($shopUser);

        $shopUser->getCustomer()
            ->willReturn($customer);

        $customer->getVendor()
            ->willReturn($vendor);

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $productTranslation->setProductDraft($productDraft)
            ->should(new ProductDraft());

        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION)
            ->shouldBeCalled();

        $productListing->setCode('code')
            ->shouldBeCalled();

        $productDraft->getCode()
            ->willReturn('code');

        $productListing->addProductDrafts($productDraft)
            ->shouldBeCalled();

        $productListing->setVendor($shopUser)
            ->shouldBeCalled();

        $productDraft->setProductListing($productListing)
            ->shouldBeCalled();

        $productListingRepository->save($productListing)
            ->should(new ProductListing());

        $this->create($productDraft, true);
    }

    public function it_save_product(
        ProductDraftInterface           $productDraft,
        ProductTranslationInterface     $productTranslation,
        ProductDraftRepositoryInterface $productDraftRepository
    )
    {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $productTranslation->setProductDraft($productDraft)
            ->should(new ProductDraft());

        $productDraftRepository->save($productDraft)
            ->should(new ProductDraft());

        $this->saveEdit($productDraft, false);
    }


    public function it_save_product_and_send(
        ProductDraftInterface           $productDraft,
        ProductTranslationInterface     $productTranslation,
        ProductDraftRepositoryInterface $productDraftRepository
    )
    {
        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $productTranslation->setProductDraft($productDraft)
            ->should(new ProductDraft());

        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION)
            ->shouldBeCalled();

        $productDraftRepository->save($productDraft)
            ->should(new ProductDraft());

        $this->saveEdit($productDraft, true);
    }

    public function it_clone(
        ProductListingInterface      $productListing,
        ProductDraftInterface        $productDraft,
        ProductDraftInterface        $newProductDraft,
        FactoryInterface             $draftFactory,
        FactoryInterface             $translationFactory,
        ProductTranslationInterface  $productTranslation,
        ProductTranslationInterface  $newTranslation,
        ProductListingPriceInterface $productListingPrice,
        ProductListingPriceInterface $newProductListingPrice,
        FactoryInterface             $priceFactory
    )
    {


        $productDraft->getProductListing()
            ->willReturn($productListing);

        $draftFactory->createNew()
            ->willReturn($newProductDraft);

        $productDraft->setVersionNumber(1)
            ->shouldBeCalled();

        $productDraft->getVersionNumber()
            ->willReturn(1);

        $productDraft->newVersion()
            ->shouldBeCalled();

        $productDraft->getCode()
            ->willReturn('test');

        $productDraft->setCode('test')
            ->shouldBeCalled();

        $productDraft->getTranslations()
            ->willReturn(new ArrayCollection([$productTranslation]));

        $translationFactory->createNew()
            ->willReturn($newTranslation);

        $productTranslation->getName()
            ->willReturn('name');

        $newTranslation->setName('name')
            ->shouldBeCalled();

        $newTranslation->setProductDraft($productDraft)
            ->shouldBeCalled();

        $productTranslation->getDescription()
            ->willReturn('description');

        $newTranslation->setDescription('description')
            ->shouldBeCalled();

        $productTranslation->getLocale()
            ->willReturn('locale');

        $newTranslation->setLocale('locale')
            ->shouldBeCalled();

        $productTranslation->getMetaDescription()
            ->willReturn('metadata');

        $newTranslation->setMetaDescription('metadata')
            ->shouldBeCalled();

        $productTranslation->getMetaKeywords()
            ->willReturn('metaKeyword');

        $newTranslation->setMetaKeywords('metaKeyword')
            ->shouldBeCalled();

        $newTranslation->setSlug($productTranslation->getSlug())
            ->shouldBeCalled();

        $productTranslation->getShortDescription()
            ->willReturn('shortDescription');

        $newTranslation->setShortDescription('shortDescription')
            ->shouldBeCalled();

        $newProductDraft->addTranslationsWithKey($newTranslation, $newTranslation->getLocale())
            ->shouldBeCalled();

        $productDraft->getProductListingPrice()
            ->willReturn(new ArrayCollection([$productListingPrice]));

        $priceFactory->createNew();
        $productListingPrice->getChannelCode()
            ->willReturn('channelCode');

        $newProductListingPrice->setChannelCode('channelCode')
            ->shouldBeCalled();

        $productListingPrice->getPrice()
            ->willReturn(1);

        $newProductListingPrice->setPrice(1)
            ->shouldBeCalled();

        $productListingPrice->getMinimumPrice()
            ->willReturn(2);

        $newProductListingPrice->setMinimumPrice(2)
            ->shouldBeCalled();

        $productListingPrice->getOriginalPrice()
            ->willReturn(3);

        $newProductListingPrice->setOriginalPrice(3)
            ->shouldBeCalled();

        $newProductListingPrice->setProductDraft($newProductDraft)
            ->shouldBeCalled();

        $newProductDraft->addProductListingPriceWithKey($newProductListingPrice, $newProductListingPrice->getChannelCode())
            ->shouldBeCalled();

        $productDraft->getProductListing()
            ->willReturn(new ProductListing());

        $newProductDraft->setProductListing($productListing)
            ->shouldBeCalled();


        $this->cloneProduct($productDraft, false);
    }
}
