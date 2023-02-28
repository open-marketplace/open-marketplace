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
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ProductTaxon;
use Sylius\Component\Core\Model\ProductTaxonInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use function Clue\StreamFilter\fun;

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

        $taxonsFromProduct = array_map(static function (ProductTaxonInterface $productTaxon) {
            return $productTaxon->getTaxon()->getId();
        }, $product->getProductTaxons()->toArray());

        $taxonsFromProductDraft = array_map(static function (ProductDraftTaxonInterface $productDraftTaxon) {
            return $productDraftTaxon->getTaxon()->getId();
        }, $productDraft->getProductDraftTaxons()->toArray());

        $sharedTaxons = array_intersect($taxonsFromProduct, $taxonsFromProductDraft);

        /** @var ProductDraftTaxonInterface $productDraftTaxon */
        foreach ($productDraft->getProductDraftTaxons() as $productDraftTaxon) {
            $taxonId = $productDraftTaxon->getTaxon()->getId();
            if (!in_array($taxonId, $sharedTaxons)) {
                /** @var ProductTaxonInterface $productTaxon */
                $productTaxon = $this->productTaxonFactory->createNew();
                $productTaxon->setProduct($product);
                $productTaxon->setTaxon($productDraftTaxon->getTaxon());
                $product->addProductTaxon($productTaxon);
            }
        }

        return $product;
    }

    public function updateTaxonsInProduct(ProductDraftInterface $productDraft, ProductInterface $product): void
    {
        if (null != $product->getMainTaxon()) {
            $product->setMainTaxon(null);
        }

        $taxonsFromProduct = array_map(static function (ProductTaxonInterface $productTaxon) {
            return $productTaxon->getTaxon()->getId();
        }, $product->getProductTaxons()->toArray());

        $taxonsFromProductDraft = array_map(static function (ProductDraftTaxonInterface $productDraftTaxon) {
            return $productDraftTaxon->getTaxon()->getId();
        }, $productDraft->getProductDraftTaxons()->toArray());

        $sharedTaxons = array_intersect($taxonsFromProduct, $taxonsFromProductDraft);

        /** @var ProductTaxon $productTaxon */
        foreach ($product->getProductTaxons() as $productTaxon) {
            $taxonId = $productTaxon->getTaxon()->getId();
            if (!in_array($taxonId, $sharedTaxons)) {
                $product->removeProductTaxon($productTaxon);
                $this->entityManager->remove($productTaxon);
            }
        }

        $this->copyTaxonsToProduct($productDraft, $product);
    }
}
