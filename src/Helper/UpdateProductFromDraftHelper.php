<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductTranslationFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ChannelPricing;
use Sylius\Component\Core\Repository\ProductVariantRepositoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class UpdateProductFromDraftHelper implements UpdateProductFromDraftHelperInterface
{
    private ProductTranslationFactoryInterface $productTranslationFactory;

    private EntityManagerInterface $entityManager;

    private EntityRepository $productTranslationRepository;

    private EntityRepository $channelPricingRepository;

    private ProductVariantRepositoryInterface $productVariantRepository;

    public function __construct(
        ProductTranslationFactoryInterface $productTranslationFactory,
        EntityManagerInterface $entityManager,
        EntityRepository $productTranslationRepository,
        EntityRepository $channelPricingRepository,
        ProductVariantRepositoryInterface $productVariantRepository
    ) {
        $this->productTranslationFactory = $productTranslationFactory;
        $this->entityManager = $entityManager;
        $this->productTranslationRepository = $productTranslationRepository;
        $this->channelPricingRepository = $channelPricingRepository;
        $this->productVariantRepository = $productVariantRepository;
    }

    public function updateProduct(ProductDraftInterface $productDraft): void
    {
        $this->updateSimpleProductProperties($productDraft->getProductListing()->getProduct(), $productDraft);

        $this->entityManager->flush();
    }

    private function updateSimpleProductProperties(ProductInterface $product, ProductDraftInterface $productDraft): void
    {
        $product->setUpdatedAt(new \DateTime());

        /** @var ProductTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
            /** @var \Sylius\Component\Core\Model\ProductTranslationInterface $productTranslation */
            $productTranslation = $this->productTranslationRepository->findOneBy(['translatable' => $product, 'locale' => $translation->getLocale()]);

            if (null !== $productTranslation) {
                $productTranslation->setName($translation->getName());
                $productTranslation->setDescription($translation->getDescription());
                $productTranslation->setSlug($translation->getSlug());
                $productTranslation->setShortDescription($translation->getShortDescription());
                $productTranslation->setMetaDescription($translation->getMetaDescription());
                $productTranslation->setMetaKeywords($translation->getMetaKeywords());
            } else {
                $productTranslation = $this->productTranslationFactory->create(
                    $product,
                    $translation->getName(),
                    $translation->getDescription(),
                    $translation->getSlug(),
                    $translation->getLocale(),
                    $translation->getShortDescription(),
                    $translation->getMetaDescription(),
                    $translation->getMetaKeywords()
                );

                $this->entityManager->persist($productTranslation);
                $product->addTranslation($productTranslation);
            }
        }

        $productVariant = $this->productVariantRepository->findOneBy(['product' => $product]);

        /** @var ProductListingPriceInterface $productListingPrice */
        foreach ($productDraft->getProductListingPrice() as $productListingPrice) {

            /** @var ChannelPricing $channelPricing */
            $channelPricing = $this->channelPricingRepository->findOneBy(['productVariant' => $productVariant, 'channelCode' => $productListingPrice->getChannelCode()]);

            if (null !== $channelPricing) {
                $channelPricing->setPrice($productListingPrice->getPrice());
                $channelPricing->setOriginalPrice($productListingPrice->getOriginalPrice());
                $channelPricing->setMinimumPrice($productListingPrice->getMinimumPrice());
            }
        }
    }
}
