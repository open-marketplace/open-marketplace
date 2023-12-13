<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\Entity;

use Ramsey\Uuid\UuidInterface;
use Sylius\Component\Attribute\Model\AttributeInterface;
use Sylius\Component\Attribute\Model\AttributeValue as BaseAttributeValue;

class DraftAttributeValue extends BaseAttributeValue implements DraftAttributeValueInterface
{
    protected ?UuidInterface $uuid = null;

    protected DraftInterface $draft;

    public function getUuid(): ?UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(?UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getDraft(): ?DraftInterface
    {
        /** @var DraftInterface $subject */
        $subject = parent::getSubject();

        return $subject;
    }

    public function setDraft(?DraftInterface $product): void
    {
        parent::setSubject($product);
    }

    public function getAttribute(): ?AttributeInterface
    {
        return $this->attribute;
    }
}
