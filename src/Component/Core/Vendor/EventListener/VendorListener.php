<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Vendor\EventListener;

use BitBag\OpenMarketplace\Component\Settlement\Creator\CompensatorySettlementsCreatorInterface;
use BitBag\OpenMarketplace\Component\Vendor\Contracts\VendorSettlementFrequency;
use BitBag\OpenMarketplace\Component\Vendor\Entity\VendorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostUpdateEventArgs;

final class VendorListener
{
    public const SETTLEMENT_FREQUENCY = 'settlementFrequency';

    public function __construct(
        private CompensatorySettlementsCreatorInterface $compensatorySettlementsCreator,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function postUpdate(VendorInterface $vendor, PostUpdateEventArgs $eventArgs): void
    {
        $objectManager = $eventArgs->getObjectManager();
        $unitOfWork = $objectManager->getUnitOfWork();
        $changeSet = $unitOfWork->getEntityChangeSet($vendor);

        if (!array_key_exists(self::SETTLEMENT_FREQUENCY, $changeSet)) {
            return;
        }

        $frequencyChangeSet = $changeSet[self::SETTLEMENT_FREQUENCY];

        $previousFrequency = $frequencyChangeSet[0];
        if (!in_array($previousFrequency, VendorSettlementFrequency::SETTLEMENT_FREQUENCIES, true)) {
            throw new \RuntimeException(sprintf(
                'Invalid settlement frequency "%s", unable to create compensatory settlement for vendor %s with id %d',
                $previousFrequency,
                $vendor->getSlug(),
                $vendor->getId()
            ));
        }

        $this->compensatorySettlementsCreator->createCompensatorySettlements($vendor, $eventArgs, $previousFrequency);

        $this->entityManager->flush();
    }
}
