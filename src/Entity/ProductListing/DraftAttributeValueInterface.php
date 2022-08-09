<?php

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

interface DraftAttributeValueInterface
{
    public function getDraft(): ?ProductDraftInterface;

    public function setDraft(?ProductDraftInterface $product): void;
}
