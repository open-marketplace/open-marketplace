<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Repository\ProductListingRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Product\Model\ProductInterface;

final class ProductListingCallbacks
{
    protected ProductListingRepositoryInterface $productListingRepository;

    private EntityManagerInterface $entityManager;


    public function __construct(
        ProductListingRepositoryInterface $productListingRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->productListingRepository = $productListingRepository;
        $this->entityManager = $entityManager;
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
        $product = new Product();
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
