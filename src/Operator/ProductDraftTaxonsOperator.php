<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftTaxonInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ProductTaxonInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductDraftTaxonsOperator implements ProductDraftTaxonsOperatorInterface
{
    private EntityManagerInterface $entityManager;

    private FactoryInterface $productTaxonFactory;

    public function __construct(EntityManagerInterface $entityManager, FactoryInterface $productTaxonFactory)
    {
        $this->entityManager = $entityManager;
        $this->productTaxonFactory = $productTaxonFactory;
    }

    public function copyTaxonsToProduct(ProductDraftInterface $productDraft, ProductInterface $product): ?ProductInterface
    {
        $productDraftMainTaxon = $productDraft->getMainTaxon();
        $product->setMainTaxon($productDraftMainTaxon);

        /** @var ProductDraftTaxonInterface $productDraftTaxon */
        foreach ($productDraft->getProductDraftTaxons() as $productDraftTaxon) {
            $taxon = $productDraftTaxon->getTaxon();
            /** @var ProductTaxonInterface $productTaxon */
            $productTaxon = $this->productTaxonFactory->createNew();
            $productTaxon->setProduct($product);
            $productTaxon->setTaxon($taxon);
            $product->addProductTaxon($productTaxon);
        }

        return $product;
    }

    public function updateTaxonsInProduct(ProductDraftInterface $productDraft, ProductInterface $product): void
    {
        if (null != $product->getMainTaxon()) {
            $product->setMainTaxon(null);
        }

        $productTaxons = $product->getProductTaxons();
        foreach ($productTaxons as $productTaxon) {
            $product->removeProductTaxon($productTaxon);
            $this->entityManager->remove($productTaxon);
        }

        $this->copyTaxonsToProduct($productDraft, $product);
    }
}
