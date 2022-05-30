<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Command\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage;

class CreateProductListingCommand implements CreateProductListingCommandInterface
{
    private RepositoryInterface $productListingRepository;
    private FactoryInterface $productListingFactoryInterface;
    private UsageTrackingTokenStorage $tokenStorage;
    private FactoryInterface $translationFactory;
    private FactoryInterface $draftFactory;
    private FactoryInterface $priceFactory;
    private RepositoryInterface $draftRepository;

    public function __construct(
        RepositoryInterface $productListingRepository,
        FactoryInterface $productListingFactoryInterface,
        UsageTrackingTokenStorage $tokenStorage,
        FactoryInterface $translationFactory,
        FactoryInterface $draftFactory,
        FactoryInterface $priceFactory,
        RepositoryInterface $draftRepository
    )
    {
        $this->productListingRepository = $productListingRepository;
        $this->productListingFactoryInterface = $productListingFactoryInterface;
        $this->tokenStorage = $tokenStorage;
        $this->translationFactory = $translationFactory;
        $this->draftFactory = $draftFactory;
        $this->priceFactory = $priceFactory;
        $this->draftRepository = $draftRepository;
    }

    public function create(ProductDraftInterface $productDraft,bool $isSend): void
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingFactoryInterface->createNew();
        $user = $this->tokenStorage->getToken()->getUser();

        $productDraft = $this->formatTranslation($productDraft);

        if ($isSend){
            $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
        }

        $productListing
            ->setCode($productDraft->getCode())
            ->addProductDrafts($productDraft)
            ->setVendor($user);

        $productDraft->setProductListing($productListing);
        $this->productListingRepository->save($productListing);
    }

    private function formatTranslation(ProductDraftInterface $productDraft)
    {
        /** @var ProductTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation){
            $translation->setProductDraft($productDraft);
        }
        return $productDraft;
    }


    public function editAndCreate(ProductDraftInterface $productDraft, bool $isSend): void
    {
        $productListing = $productDraft->getProductListing();

        /** @var ProductDraftInterface $newProductDrat */
        $newProductDrat = $this->draftFactory->createNew();
        $newProductDrat
            ->setVersionNumber($productDraft->getVersionNumber()+1)
            ->setCode($productDraft->getCode())
            ->setProductListing($productListing);

        if ($isSend){
            $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
        }

        $this->cloneTranslation($newProductDrat, $productDraft);

        $this->clonePrice($newProductDrat, $productDraft);

        $newProductDrat->setProductListing($this->productListingRepository->find($productDraft->getProductListing()->getId()));

        $this->draftRepository->save($newProductDrat);
    }

    private function cloneTranslation(ProductDraftInterface $newProductDrat, ProductDraftInterface $productDraft): void
    {
        /** @var ProductTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation )
        {
            /** @var ProductTranslationInterface $newTranslation */
            $newTranslation = $this->translationFactory->createNew();
            $newTranslation
                ->setName($translation->getName())
                ->setProductDraft($newProductDrat)
                ->setDescription($translation->getDescription())
                ->setLocale($translation->getLocale())
                ->setMetaDescription($translation->getMetaDescription())
                ->setMetaKeywords($translation->getMetaKeywords())
                ->setSlug($translation->getSlug())
                ->setShortDescription($translation->getShortDescription());
            $newProductDrat->addTranslations($newTranslation);
        }
    }

    private function clonePrice(ProductDraftInterface $newProductDrat, ProductDraftInterface $productDraft): void
    {
        /** @var ProductListingPriceInterface $price */
        foreach ($productDraft->getProductListingPrice() as $price)
        {
            /** @var ProductListingPriceInterface $newPrice */
            $newPrice = $this->priceFactory->createNew();
            $newPrice
                ->setChannelCode($price->getChannelCode())
                ->setPrice($price->getPrice())
                ->setMinimumPrice($price->getMinimumPrice())
                ->setOriginalPrice($price->getOriginalPrice())
                ->setProductDraft($newProductDrat);
            $newProductDrat->addProductListingPrice($newPrice);
        }
    }
}