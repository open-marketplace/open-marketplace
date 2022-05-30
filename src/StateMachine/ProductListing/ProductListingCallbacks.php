<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListingInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class ProductListingCallbacks
{
    private EntityManagerInterface $entityManager;

    private ProductFactoryInterface $productFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        ProductFactoryInterface $productFactory
    ) {
        $this->entityManager = $entityManager;
        $this->productFactory = $productFactory;
    }

    public function sendToVerify(ProductListingInterface $productListing): void
    {
        $productListing->setStatus(ProductListingInterface::STATUS_UNDER_VERIFICATION);
        $this->entityManager->flush();
    }

    public function verify(ProductListingInterface $productListing): void
    {
        $productListing->setStatus(ProductListingInterface::STATUS_VERIFIED);
        $productListing->setVerifiedAt((new \DateTime()));

        if (!$productListing->getProduct()) {
            $this->createProduct($productListing);
        }

        $this->editProduct($productListing);
    }

    public function reject(ProductListingInterface $productListing): void
    {
        $productListing->setStatus(ProductListingInterface::STATUS_REJECTED);
        $productListing->setVerifiedAt((new \DateTime()));
        $this->entityManager->flush();
    }

    private function createProduct(ProductListingInterface $productListing): void
    {
        /** @var ProductInterface $product */
        $product = $this->productFactory->createNew();
        $product = $this->setProductFields($product, $productListing);

        $productListing->setProduct($product);
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    private function editProduct(ProductListingInterface $productListing): void
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
