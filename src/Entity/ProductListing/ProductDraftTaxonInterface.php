<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity\ProductListing;

use BitBag\OpenMarketplace\Entity\UuidAwareInterface;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductDraftTaxonInterface extends ResourceInterface, UuidAwareInterface
{
    public function getProductDraft(): ?ProductDraftInterface;

    public function setProductDraft(?ProductDraftInterface $productDraft): void;

    public function getTaxon(): ?TaxonInterface;

    public function setTaxon(?TaxonInterface $taxon): void;

    public function getPosition(): ?int;

    public function setPosition(?int $position): void;
}
