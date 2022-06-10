<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\StateMachine\ProductListing;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\ProductDraftInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Repository\ProductRepositoryInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;
use Sylius\Component\Product\Model\ProductInterface;

final class ProductDraftCallbacks
{
    private EntityManagerInterface $entityManager;

    private ProductFactoryInterface $productFactory;

    private ProductRepositoryInterface $productRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        ProductFactoryInterface $productFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->entityManager = $entityManager;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
    }

    public function sendToVerify(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_UNDER_VERIFICATION);
        $this->entityManager->flush();
    }

    public function verify(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_VERIFIED);
        $productDraft->setVerifiedAt((new \DateTime()));

        if (!$productDraft->getProductListing()->getProduct()) {
            $this->createProduct($productDraft);
        }

        $this->editProduct($productDraft);
    }

    public function reject(ProductDraftInterface $productDraft): void
    {
        $productDraft->setStatus(ProductDraftInterface::STATUS_REJECTED);
        $productDraft->setVerifiedAt((new \DateTime()));
        $this->entityManager->flush();
    }

    private function createProduct(ProductDraftInterface $productDraft): void
    {
        /** @var ProductInterface $product */
        $product = $this->productFactory->createNew();
        $product = $this->setProductFields($product, $productDraft);

        $productDraft->getProductListing()->setProduct($product);
        $this->productRepository->add($product);
    }

    private function editProduct(ProductDraftInterface $productDraft): void
    {
        $this->setProductFields($productDraft->getProductListing()->getProduct(), $productDraft);
        $this->entityManager->flush();
    }

    private function setProductFields(ProductInterface $product, ProductDraftInterface $productDraft): ProductInterface
    {
        $now = new \DateTime();

        $product->setCode($productDraft->getCode());
        $product->setEnabled(true);
        $product->setUpdatedAt($now);

        if (!$product->getCreatedAt()) {
            $product->setCreatedAt($now);
        }

        return $product;
    }
}
