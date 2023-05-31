<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftTaxonInterface;
use BitBag\OpenMarketplace\Entity\ProductInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ProductTaxon;
use Sylius\Component\Core\Model\ProductTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;
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

    public function copyTaxonsToProduct(DraftInterface $productDraft, ProductInterface $product): ?ProductInterface
    {
        $productDraftMainTaxon = $productDraft->getMainTaxon();
        $product->setMainTaxon($productDraftMainTaxon);

        $taxonIdsFromProduct = $this->getTaxonIdsForProduct($product);

        $taxonIdsFromProductDraft = $this->getTaxonIdsForProductDraft($productDraft);

        $sharedTaxonIds = array_intersect($taxonIdsFromProduct, $taxonIdsFromProductDraft);

        /** @var DraftTaxonInterface $productDraftTaxon */
        foreach ($productDraft->getProductDraftTaxons() as $productDraftTaxon) {
            /** @var TaxonInterface $taxon */
            $taxon = $productDraftTaxon->getTaxon();
            if (!in_array($taxon->getId(), $sharedTaxonIds)) {
                /** @var ProductTaxonInterface $productTaxon */
                $productTaxon = $this->productTaxonFactory->createNew();
                $productTaxon->setProduct($product);
                $productTaxon->setTaxon($productDraftTaxon->getTaxon());
                $product->addProductTaxon($productTaxon);
            }
        }

        return $product;
    }

    public function updateTaxonsInProduct(DraftInterface $productDraft, ProductInterface $product): void
    {
        if (null != $product->getMainTaxon()) {
            $product->setMainTaxon(null);
        }

        $taxonIdsFromProduct = $this->getTaxonIdsForProduct($product);

        $taxonIdsFromProductDraft = $this->getTaxonIdsForProductDraft($productDraft);

        $sharedTaxonIds = array_intersect($taxonIdsFromProduct, $taxonIdsFromProductDraft);

        /** @var ProductTaxon $productTaxon */
        foreach ($product->getProductTaxons() as $productTaxon) {
            /** @var TaxonInterface $taxon */
            $taxon = $productTaxon->getTaxon();
            if (!in_array($taxon->getId(), $sharedTaxonIds)) {
                $product->removeProductTaxon($productTaxon);
                $this->entityManager->remove($productTaxon);
            }
        }

        $this->copyTaxonsToProduct($productDraft, $product);
    }

    private function getTaxonIdsForProduct(ProductInterface $product): array
    {
        $taxonIds = [];
        foreach ($product->getProductTaxons() as $productTaxon) {
            /** @var TaxonInterface $taxon */
            $taxon = $productTaxon->getTaxon();
            $taxonIds[] = $taxon->getId();
        }

        return $taxonIds;
    }

    private function getTaxonIdsForProductDraft(DraftInterface $productDraft): array
    {
        $taxonIds = [];
        foreach ($productDraft->getProductDraftTaxons() as $productDraftTaxon) {
            /** @var TaxonInterface $taxon */
            $taxon = $productDraftTaxon->getTaxon();
            $taxonIds[] = $taxon->getId();
        }

        return $taxonIds;
    }
}
