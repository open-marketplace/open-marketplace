<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

interface DraftAttributeValueInterface
{
    public function getDraft(): ?ProductDraftInterface;

    public function setDraft(?ProductDraftInterface $product): void;
}
