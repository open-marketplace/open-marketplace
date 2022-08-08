<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

interface DraftAttributeValueInterface
{
    public function getProduct(): ?ProductDraftInterface;

    public function setProduct(?ProductDraftInterface $product): void;
}
