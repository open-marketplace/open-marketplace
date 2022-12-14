<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Entity\ProductListing;

use Ramsey\Uuid\UuidInterface;
use Sylius\Component\Attribute\Model\AttributeTranslation;

class DraftAttributeTranslation extends AttributeTranslation implements DraftAttributeTranslationInterface
{
    protected ?UuidInterface $uuid = null;

    public function getUuid(): ?UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(?UuidInterface $uuid): void
    {
        $this->uuid = $uuid;
    }
}
