<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListing\ProductListingRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class ProductListingCallbacks
{
    protected ProductListingRepositoryInterface $productListingRepository;

    private EntityManagerInterface $entityManager;
    private ProductFactoryInterface $productFactory;


    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        EntityManagerInterface $entityManager,
        ProductFactoryInterface $productFactory
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->entityManager = $entityManager;
        $this->productFactory = $productFactory;
    }

    public function sendToVerify(ProductListingInterface $productListing)
    {
        $productListing->setStatus(ProductListingInterface::STATUS_UNDER_VERIFICATION);
        $this->entityManager->flush();
    }

    public function verify(ProductListingInterface $productListing)
    {
        $productListing->setStatus(ProductListingInterface::STATUS_VERIFIED);
        $productListing->setVerifiedAt((new \DateTime()));

        if (!$productListing->getProduct()) {
            $this->createProduct($productListing);
        }

        $this->editProduct($productListing);
    }

    public function reject(ProductListingInterface $productListing)
    {
        $productListing->setStatus(ProductListingInterface::STATUS_REJECTED);
        $productListing->setVerifiedAt((new \DateTime()));
        $this->entityManager->flush();
    }

    private function createProduct(ProductListingInterface $productListing)
    {
        /** @var ProductInterface $product */
        $product = $this->productFactory->createNew();
        $product = $this->setProductFields($product, $productListing);

        $productListing->setProduct($product);
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    private function editProduct(ProductListingInterface $productListing)
    {
        $this->setProductFields($productListing->getProduct(), $productListing);
        $this->entityManager->flush();
    }

    private function setProductFields(ProductInterface $product, ProductListingInterface $productListing): ProductInterface
    {
        $now = new \DateTime();

        $product->setCurrentLocale($productListing->getLocale());
        $product->setSlug($productListing->getSlug());
        $product->setName($productListing->getName());
        $product->setEnabled(true);
        $product->setCode($productListing->getCode());
        $product->setUpdatedAt($now);

        if (!$product->getCreatedAt()) {
            $product->setCreatedAt($now);
        }

        return $product;
    }
}
