<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Cloner;

use BitBag\OpenMarketplace\Component\ProductListing\DraftGenerator\Factory\DraftAttributeValueFactoryInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftAttributeInterface;
use BitBag\OpenMarketplace\Component\ProductListing\Entity\DraftInterface;
use Doctrine\ORM\EntityManagerInterface;
use Webmozart\Assert\Assert;

final class DraftAttributesCloner implements DraftAttributesClonerInterface
{
    public function __construct(
        private DraftAttributeValueFactoryInterface $draftAttributeValueFactory,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function clone(
        DraftInterface $from,
        DraftInterface $to
    ): void {
        foreach ($from->getAttributes() as $baseAttribute) {
            $attribute = $baseAttribute->getAttribute();
            Assert::isInstanceOf($attribute, DraftAttributeInterface::class);

            $attributeValue = $this->draftAttributeValueFactory->createForAttribute($attribute, $to);
            $attributeValue->setValue($baseAttribute->getValue());
            $to->addAttribute($attributeValue);

            $this->entityManager->persist($attributeValue);
        }
    }
}
