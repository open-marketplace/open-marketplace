<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing;

use Sylius\Component\Attribute\Model\AttributeValue as BaseAttributeValue;

class DraftAttributeValue extends BaseAttributeValue implements DraftAttributeValueInterface
{
    protected ProductDraftInterface $draft;

    public function getDraft(): ?ProductDraftInterface
    {
        /** @var ProductDraftInterface $subject */
        $subject = parent::getSubject();

        return $subject;
    }

    public function setDraft(?ProductDraftInterface $product): void
    {
        parent::setSubject($product);
    }
}
