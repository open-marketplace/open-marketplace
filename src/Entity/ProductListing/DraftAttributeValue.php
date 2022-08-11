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
use Webmozart\Assert\Assert;

class DraftAttributeValue extends BaseAttributeValue //implements DraftAttributeValueInterface
{
    protected ProductDraftInterface $draft;

    public function getDraft(): ?ProductDraftInterface
    {
        $subject = parent::getSubject();

        /** @var ProductDraftInterface|null $subject */
        Assert::nullOrIsInstanceOf($subject, ProductDraftInterface::class);

        return $subject;
    }

    public function setDraft(?ProductDraftInterface $product): void
    {
        parent::setSubject($product);
    }
}
