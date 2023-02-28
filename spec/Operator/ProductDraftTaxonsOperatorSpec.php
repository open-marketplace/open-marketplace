<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace spec\BitBag\OpenMarketplace\Operator;

use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftInterface;
use BitBag\OpenMarketplace\Entity\ProductListing\ProductDraftTaxonInterface;
use BitBag\OpenMarketplace\Operator\ProductDraftTaxonsOperator;
use BitBag\OpenMarketplace\Operator\ProductDraftTaxonsOperatorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ProductTaxonInterface;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class ProductDraftTaxonsOperatorSpec extends ObjectBehavior
{
    public function let(
        EntityManagerInterface $entityManager,
        FactoryInterface $productTaxonFactory
    ): void {
        $this->beConstructedWith(
            $entityManager,
            $productTaxonFactory
        );
    }

    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductDraftTaxonsOperator::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ProductDraftTaxonsOperatorInterface::class);
    }

    public function it_copies_non_existing_taxons_from_draft_to_product(
        ProductDraftInterface $productDraft,
        ProductInterface $product,
        TaxonInterface $taxon,
        ProductDraftTaxonInterface $productDraftTaxon,
        ProductTaxonInterface $productTaxon,
        FactoryInterface $productTaxonFactory
    ) {
        $productDraft->getMainTaxon()->willReturn($taxon);

        $product->getProductTaxons()->willReturn(new ArrayCollection([]));
        $productDraft->getProductDraftTaxons()->willReturn(new ArrayCollection([$productDraftTaxon->getWrappedObject()]));
        $productDraftTaxon->getTaxon()->willReturn($taxon);
        $productDraftTaxon->getProductDraft()->willReturn($productDraft);
        $taxon->getId()->willReturn(1);
        $productTaxonFactory->createNew()->willReturn($productTaxon);
        $productTaxon->getProduct()->willReturn(null);
        $productTaxon->getTaxon()->willReturn(null);

        $this->copyTaxonsToProduct($productDraft, $product);

        $productTaxon->setProduct($product)->shouldHaveBeenCalled();
        $productTaxon->setTaxon($taxon)->shouldHaveBeenCalled();
        $product->addProductTaxon($productTaxon)->shouldHaveBeenCalled();
        $product->setMainTaxon($taxon)->shouldHaveBeenCalled();
    }

    public function it_do_not_copy_existing_taxons_from_draft_to_product(
        ProductDraftInterface $productDraft,
        ProductInterface $product,
        TaxonInterface $taxon,
        ProductDraftTaxonInterface $productDraftTaxon,
        ProductTaxonInterface $productTaxon,
        FactoryInterface $productTaxonFactory
    ) {
        $productDraft->getMainTaxon()->willReturn($taxon);

        $product->getProductTaxons()->willReturn(new ArrayCollection([$productTaxon->getWrappedObject()]));
        $productTaxon->getTaxon()->willReturn($taxon);
        $productTaxon->getProduct()->willReturn($product);

        $productDraft->getProductDraftTaxons()->willReturn(new ArrayCollection([$productDraftTaxon->getWrappedObject()]));
        $productDraftTaxon->getTaxon()->willReturn($taxon);
        $productDraftTaxon->getProductDraft()->willReturn($productDraft);

        $taxon->getId()->willReturn(1);
        $productTaxonFactory->createNew()->willReturn($productTaxon);

        $this->copyTaxonsToProduct($productDraft, $product);

        $productTaxon->setProduct($product)->shouldNotBeCalled();
        $productTaxon->setTaxon($taxon)->shouldNotBeCalled();
        $product->addProductTaxon($productTaxon)->shouldNotBeCalled();
        $product->setMainTaxon($taxon)->shouldHaveBeenCalled();
    }
}
