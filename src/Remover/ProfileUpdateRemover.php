<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Remover;

use BitBag\OpenMarketplace\Entity\VendorProfileUpdateInterface;
use Doctrine\ORM\EntityManagerInterface;

final class ProfileUpdateRemover implements ProfileUpdateRemoverInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function removePendingUpdate(VendorProfileUpdateInterface $profileUpdate): void
    {
        $pendingAddressChange = $profileUpdate->getVendorAddress();

        if (null !== $pendingAddressChange) {
            $this->entityManager->remove($pendingAddressChange);
        }

        $this->entityManager->remove($profileUpdate);
        $this->entityManager->flush();
    }
}
