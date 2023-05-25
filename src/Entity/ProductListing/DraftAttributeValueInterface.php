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
use Ramsey\Uuid\UuidInterface;
use Sylius\Component\Attribute\Model\AttributeValueInterface;

interface DraftAttributeValueInterface extends AttributeValueInterface, UuidAwareInterface
{
    public function getUuid(): ?UuidInterface;

    public function setUuid(?UuidInterface $uuid): void;

    public function getDraft(): ?ProductDraftInterface;

    public function setDraft(?ProductDraftInterface $product): void;

    public function getAttribute(): ?DraftAttributeInterface;
}
