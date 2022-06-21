<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\VendorProfileUpdateRemover;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileUpdateInterface;
use Doctrine\ORM\EntityManagerInterface;

final class Remover implements RemoverInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function removePendingData(VendorProfileUpdateInterface $vendorData): void
    {
        $mergedUpdate = $this->entityManager->merge($vendorData);
        $pendingAddressChange = $vendorData->getVendorAddress();
        if (null !== $pendingAddressChange) {
            $merged = $this->entityManager->merge($pendingAddressChange);
            $this->entityManager->remove($merged);
        }
        $this->entityManager->remove($mergedUpdate);
        $this->entityManager->flush();
    }
}
