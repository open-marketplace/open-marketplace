<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Helper;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingPriceInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductTranslationInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ChannelPricingFactoryInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Factory\ProductTranslationFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Channel\Repository\ChannelRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Factory\ProductVariantFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class CreateProductFromDraftHelper implements CreateProductFromDraftHelperInterface
{
    private ProductFactoryInterface $productFactory;

    private ProductTranslationFactoryInterface $productTranslationFactory;

    private EntityManagerInterface $entityManager;

    private ProductVariantFactoryInterface $productVariantFactory;

    private ChannelPricingFactoryInterface $channelPricingFactory;

    private ChannelRepositoryInterface $channelRepository;

    public function __construct(
        ProductFactoryInterface $productFactory,
        ProductTranslationFactoryInterface $productTranslationFactory,
        EntityManagerInterface $entityManager,
        ProductVariantFactoryInterface $productVariantFactory,
        ChannelPricingFactoryInterface $channelPricingFactory,
        ChannelRepositoryInterface $channelRepository
    ) {
        $this->productFactory = $productFactory;
        $this->productTranslationFactory = $productTranslationFactory;
        $this->entityManager = $entityManager;
        $this->productVariantFactory = $productVariantFactory;
        $this->channelPricingFactory = $channelPricingFactory;
        $this->channelRepository = $channelRepository;
    }

    public function createSimpleProduct(ProductDraftInterface $productDraft): void
    {
        /** @var ProductInterface $product */
        $product = $this->productFactory->createNew();
        $product = $this->setSimpleProductProperties($product, $productDraft);

        $productDraft->getProductListing()->setProduct($product);
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    private function setSimpleProductProperties(ProductInterface $product, ProductDraftInterface $productDraft): ProductInterface
    {
        $now = new \DateTime();

        $product->setCode($productDraft->getCode());
        $product->setEnabled(true);
        $product->setUpdatedAt($now);
        $product->setCreatedAt($now);

        /** @var ProductTranslationInterface $translation */
        foreach ($productDraft->getTranslations() as $translation) {
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

        $productVariant = $this->productVariantFactory->createForProduct($product);
        $productVariant->setCode($product->getCode());
        $productVariant->setEnabled(true);
        $productVariant->setPosition(0);

        $this->entityManager->persist($productVariant);

        $channelPricingCodes = [];
        /** @var ProductListingPriceInterface $productListingPrice */
        foreach ($productDraft->getProductListingPrice() as $productListingPrice) {
            if (!in_array($productListingPrice->getChannelCode(), $channelPricingCodes)) {
                $channelPricingCodes[] = $productListingPrice->getChannelCode();
            }

            $channelPricing = $this->channelPricingFactory->create(
                $productVariant,
                $productListingPrice->getChannelCode(),
                $productListingPrice->getPrice(),
                $productListingPrice->getOriginalPrice(),
                $productListingPrice->getMinimumPrice(),
            );

            $this->entityManager->persist($channelPricing);
        }

        foreach ($channelPricingCodes as $channelPricingCode) {
            $channel = $this->channelRepository->findOneBy(['code' => $channelPricingCode]);
            if (null !== $channel) {
                $product->addChannel($channel);
            }
        }

        return $product;
    }
}
