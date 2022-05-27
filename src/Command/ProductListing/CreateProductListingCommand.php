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
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage;

class CreateProductListingCommand implements CreateProductListingCommandInterface
{
    private RepositoryInterface $productListingRepository;
    private FactoryInterface $productListingFactoryInterface;
    private UsageTrackingTokenStorage $tokenStorage;

    public function __construct(
        RepositoryInterface $productListingRepository,
        FactoryInterface $productListingFactoryInterface,
        UsageTrackingTokenStorage $tokenStorage
    )
    {
        $this->productListingRepository = $productListingRepository;
        $this->productListingFactoryInterface = $productListingFactoryInterface;
        $this->tokenStorage = $tokenStorage;
    }

    public function create(ProductDraftInterface $productDraft): void
    {
        /** @var ProductListingInterface $productListing */
        $productListing = $this->productListingFactoryInterface->createNew();
        $user = $this->tokenStorage->getToken()->getUser();

        $productDraft = $this->formatTranslation($productDraft);

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


}