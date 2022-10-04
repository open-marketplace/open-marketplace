<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity\ProductListing;

use Sylius\Component\Core\Model\TaxonInterface;

class ProductDraftTaxon implements ProductDraftTaxonInterface
{
    protected mixed $id;

    protected ProductDraftInterface|null $productDraft;

    protected TaxonInterface|null $taxon;

    protected int|null $position;

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getProductDraft(): ?ProductDraftInterface
    {
        return $this->productDraft;
    }

    public function setProductDraft(?ProductDraftInterface $productDraft): void
    {
        $this->productDraft = $productDraft;
    }

    public function getTaxon(): ?TaxonInterface
    {
        return $this->taxon;
    }

    public function setTaxon(?TaxonInterface $taxon): void
    {
        $this->taxon = $taxon;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }
}
